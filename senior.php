<?php
    require_once "db_connect.php";

    $sql = "SELECT * FROM animals WHERE age > 8";
    $result = mysqli_query($connect, $sql);
    $body = "";

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $body .= "<div>
            <div class='card text-center' style='width: 18rem;'>
            <img src='../images/{$row["image"]}' style='height: 12rem;' class='card-img-top p-1' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>{$row["name"]}</h5>
              <p class='card-text'>Age: {$row["age"]}</p>
              <a href='details.php?id={$row["id"]}' class='btn btn-primary'>Show more</a>
              </div>
            </div>
          </div>";
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
    <h1>Our senior animals</h1>

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