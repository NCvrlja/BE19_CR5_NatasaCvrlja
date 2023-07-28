<?php
    require_once "db_connect.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $body = "";

    $body .= "<div class='card' style='width: 22rem; text-align: center;'>
    <div class='card-body'>
    <div>
      <img class='card-img object-fit-cover' style='width: 20rem; height: 12rem;' src='images/{$row['image']}'>
      <h4 class='card-title' style='margin-top:4%'>{$row["name"]}</h4>
      <p class='card-text'>Address: {$row["address"]}</p>
      <p class='card-text'>{$row["description"]}</p>
      <p class='card-text'>Age of the animal: {$row["age"]}</p>
      <p class='card-text'>Size of the animal: {$row["size"]}</p>
      <p class='card-text'>Breed: {$row["breed"]}</p>
      <p class='card-text'>Availability: {$row["availability"]}</p>
      <a href='home.php' class='btn btn-primary'>Go back</a>
      </div>
    </div>
  </div>"

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
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php" >Home</a>
                </li>
                <li class="nav-item">
          <a class="nav-link" href="senior.php">Senior animals</a>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a >
                </li>
            </ul>
        </div>
    </nav>

<div class="container my-2 text-center">
    <h1><i>Adopt, don't shop!</i></h1>
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