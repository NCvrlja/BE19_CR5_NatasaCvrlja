<?php
    session_start();

    require_once "db_connect.php";
    require_once "file_upload.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);

    $backBtn = "home.php";

    if(isset($_POST["adm"])){
        $backBtn = "dashboard.php";
    }
    if(isset($_POST["update"])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phonen = $_POST["phonen"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $picture = fileUpload($_FILES["picture"]);

        if($_FILES["picture"]["error"] == 0){
            if($row["picture"] !="avatar.png"){
                unlink("pictures/$row[picture]");
            }
            $sql = "UPDATE users SET firstName = '$fname', lastName = '$lname', email = '$email', phoneNumb = $phonen, address = '$address', picture = '$picture[0]', password = '$password'";
        } else{
            "UPDATE users SET firstName = '$fname', lastName = '$lname', email = '$email', phoneNumb = $phonen, address = '$address', picture = '$picture[0]', password = '$password' WHERE id = {$id}";
        }

        if(mysqli_query($connect, $sql)){
            echo "<div class='alert alert-success' role='alert'>
            user has been updated, {$picture[0]}
            </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            error found, {$picture[1]}
            </div>";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" >Login</a>
                </li>
                <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a >
                </li>
            </ul>
        </div>
    </nav>
<div class="container">
            <h1 class="text-center">Edit profile</h1>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="fname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?= $row["firstName"] ?>">
               </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?= $row["lastName"] ?>">
               </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Profile picture</label>
                    <input type="file" class="form-control" id="picture" name="picture">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $row["email"] ?>">
               </div>
                <div class="mb-3">
                    <label for="phonen" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phonen" name="phonen" placeholder="Phone number" value="<?= $row["phoneNumb"] ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $row["address"] ?>">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
              </div>
                <button name="update" type="submit" class="btn btn-warning">Update profile</button>
                <a href="<?= $backBtn ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
        <footer>
        <div stlye="height: 20px; width: 100%;" class="text-center py-3 bg-dark ">
            <p style="color: white;">Copyright © Natasa Cvrlja</p>
        </div>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>