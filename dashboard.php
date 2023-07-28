<?php
    session_start(); 

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){ 
        header("Location: login.php"); 
    }

    if(isset($_SESSION["user"])){ 
        header("Location: home.php"); 
    }

    require_once "db_connect.php";

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["adm"]}"; // selecting logged-in user details from the session user 
    
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);


    // admin can see all users and edit users

    $sqlUsers = "SELECT * FROM users WHERE status != 'adm'";
    $resultUsers = mysqli_query($connect, $sqlUsers);

    $body = "";

    if(mysqli_num_rows($resultUsers) > 0){
        while($userRow = mysqli_fetch_assoc($resultUsers)){
            $body .= "<div>
            <div class='card' style='width: 18rem;'>
                <img src='images/{$userRow["picture"]}' class='card-img-top' alt='...'>
                <div class='card-body'>
                <h5 class='card-title'>{$userRow["firstName"]} {$userRow["lastName"]}</h5>
                <p class='card-text'>{$userRow["email"]}</p>
                <a href='edit.php?id={$userRow["id"]}' class='btn btn-warning'>Update account</a>
            </div>
        </div>
      </div>";
        }
    }else {
        $body .= "No results found!";
    }

    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $row["firstName"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="animals/home.php">Animals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit.php?id=<?= $row["id"] ?>">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a>
                </li>
            </ul>
            <a class="navbar-brand" href="#">
                <img src="images/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
            </a>
            <p>ADMIN: </p>
            <p><?= $row["email"] ?></p>
            
        </div>
    </nav>
    <h2 class="text-center">Welcome <?= $row["firstName"] . " " . $row["lastName"] ?></h2>

    <div class="container">
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1 g-2">
            <?= $body ?>
        </div>
    </div>
    <footer>
        <div stlye="height: 20px; width: 100%;" class="text-center py-3 bg-dark ">
            <p style="color: white;">Copyright © Natasa Cvrlja</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>