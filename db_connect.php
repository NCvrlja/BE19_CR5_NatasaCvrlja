<?php

    $user = "root";
    $host = "localhost";
    $pass = "";
    $dbname = "be19_cr5_animal_adoption_natasacvrlja";

    $connect = mysqli_connect($host, $user, $pass, $dbname);

    if (!$connect) {
        die("Connection failed");
     }