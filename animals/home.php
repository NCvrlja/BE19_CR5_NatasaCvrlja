<?php

    require_once "../db_connect.php";

    session_start();

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../login.php");
    }

    $sql = "SELECT * FROM animals";
    $result = mysqli_query($connect, $sql);
    $body = "";

    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
            $body .= "<div>
            <div class='card text-center' style='width: 18rem;'>
            <img src='../images/{$row["image"]}' style='height: 12rem;' class='card-img-top p-1' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>{$row["name"]}</h5>
              <p class='card-text'>{$row["address"]}</p>
              <a href='../details.php?id={$row["id"]}' class='btn btn-primary'>Show more</a>
              <a href='update.php?id={$row["id"]}' class='btn btn-success'>Edit</a>
              <a href='delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
              </div>
            </div>
          </div>";
        }
    } else {
        $body .= "<h1>No result.</h1>";
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
          <a class="nav-link" href="../senior.php">Senior animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Add new pets</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-2 text-center">
    <h1><i>Adopt, don't shop!</i></h1>
    <h2>See our lovely pets waiting for being adopted:</h2>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>