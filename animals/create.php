<?php

    
    require_once "../db_connect.php";
    require_once "../file_upload.php";

    session_start();

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../login.php");
    }

    if(isset($_POST["create"])){
        $name = $_POST['name'];
        $image = fileUpload($_FILES["image"], "animal");
        $address = $_POST['address'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $size = $_POST['size'];
        $breed = $_POST['breed'];

        $sql = "INSERT INTO `animals`(`name`, `image`, `address`, `description`, `age`, `size`, `breed`) VALUES ('[$name','{$image[0]}','$address','$description',$age,'$size','$breed')";

        if(mysqli_query($connect, $sql)){
            echo "<div class='alert alert-success' role='alert'>
           New record has been created, {$image[1]}
         </div>" ;
         header("refresh: 3; url= index.php");
        } else  {
            echo "<div class='alert alert-danger' role='alert'>
            error found, {$picture[1]}
          </div>" ;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR5 Natasa Cvrlja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dashboard.php">Home</a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Animals</a>
       </li>
        <li class="nav-item">
          <a class="nav-link" href="../senior.php">Senior animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Add new pets</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" aria-describedby="address" name="address">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" aria-describedby="image" name="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" aria-describedby="description" name="description">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="text" class="form-control" id="age" aria-describedby="age" name="age">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size:</label>
                <input type="text" class="form-control" id="size" aria-describedby="size" name="size">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed:</label>
                <input type="text" class="form-control" id="breed" aria-describedby="breed" name="breed">
            </div>
            <button type="submit" class="btn btn-primary" name="create">New pet</button>
        </form>
    </div>
</div>

<footer>
        <div stlye="height: 20px; width: 100%;" class="text-center py-3 bg-dark ">
            <p style="color: white;">Copyright © Natasa Cvrlja</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>