<?php

    session_start();

    if(isset($_SESSION["adm"])){
        header("Location: dashboard.php");
    }

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: login.php");
    }

    require_once "db_connect.php";

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);
    $sqlAnimals = "SELECT * FROM animals";
    $resultAnimals = mysqli_query($connect, $sqlAnimals);
    
    $body = "";

    if(mysqli_num_rows($resultAnimals) > 0){
        while($rowAnimals = mysqli_fetch_assoc($resultAnimals)){
            $body .= "<div>
            <div class='card text-center' style='width: 18rem;'>
            <img src='images/{$rowAnimals["image"]}' style='height: 12rem;' class='card-img-top p-1' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>{$rowAnimals["name"]}</h5>
              <p class='card-text'>{$rowAnimals["address"]}</p>
              <p class='card-text'>Availability: {$rowAnimals["availability"]}</p>
              <a href='details.php?id={$rowAnimals["id"]}' class='btn btn-primary'>Show more</a>
              <hr>
              <a href='adopt.php?id={$rowAnimals["id"]}' class='btn btn-primary'>Take me home</a>
              </div>
            </div>
          </div>";
        }
    }else {
        $body.= "No results found!";
    }
?>

<!-- <form action='adopt.php' method='post'>
              <input type='hidden' name='animals_id' value=''> -->
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta  name="viewport"  content="width=device-width, initial-scale=1.0" >
   <title>Welcome <?= $row["firstName"] ?></title>
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel= "stylesheet" integrity ="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin= "anonymous">

</head>
<body>
   <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" >Home</a>
                </li>
                <li class="nav-item">
          <a class="nav-link" href="senior.php">Senior animals</a>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit.php?id=<?= $row["id"] ?>">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a >
                </li>
            </ul>
            <a class="navbar-brand" href="#">
                <img src="images/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
            </a>
            <p><?= $row["email"] ?></p>
        </div>
    </nav>
    <h2 class="text-center">Welcome <?= $row[ "firstName"] . " " . $row[ "lastName"] ?></h2>

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