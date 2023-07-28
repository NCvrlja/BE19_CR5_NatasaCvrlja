<?php
    require_once "db_connect.php";

    session_start();

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../login.php");
    }
    
    $id = $_GET["id"];

    $sql = "DELETE FROM animals WHERE id = $id";

    if(mysqli_query($connect, $sql)){
        header("location: home.php");
    }else {
        echo "Error";
    }