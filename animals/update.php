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

    $id = $_GET["id"];

    $sql = "SELECT * FROM animals WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["update"])){
        $name = $_POST['name'];
        $image = fileUpload($_FILES["image"], "animal");
        $address = $_POST['address'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $size = $_POST['size'];
        $breed = $_POST['breed'];
        $availability = $_POST['availability'];

        $sql = "UPDATE animals SET `name` = '$name', `image` = '{$image[0]}', `address` = '$address', `description` = '$description', `age` = $age, `size` = '$size', `breed` = '$breed', `availability` = '$availability' WHERE id = $id";

        if(mysqli_query($connect, $sql)){
            echo "<div class='alert alert-success' role='alert'>
               The record has been updated
                </div>" ;
         header("refresh: 1; url= home.php");
        }else  {
            echo "<div class='alert alert-danger' role='alert'>
            error found
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
                <input value="<?= $row["name"] ?>"  type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input value="<?= $row["address"] ?>"  type="text" class="form-control" id="address" aria-describedby="address" name="address">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input  type="file" class="form-control" id="image" aria-describedby="image" name="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input value="<?= $row["description"] ?>"  type="text" class="form-control" id="description" aria-describedby="description" name="description">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input value="<?= $row["age"] ?>"  type="text" class="form-control" id="age" aria-describedby="age" name="age">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size:</label>
                <input value="<?= $row["size"] ?>"  type="text" class="form-control" id="size" aria-describedby="size" name="size">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed:</label>
                <input value="<?= $row["breed"] ?>"  type="text" class="form-control" id="breed" aria-describedby="breed" name="breed">
            </div>
            <div class="mb-3">
                <label for="availability" class="form-label">Availability:</label>
                <input value="<?= $row["availability"] ?>"  type="text" class="form-control" id="availability" aria-describedby="availability" name="availability">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update information</button>
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