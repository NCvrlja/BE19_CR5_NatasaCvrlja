<?php
    session_start();

    if(isset($_SESSION["user"])){ // if a session "user" is exist and have a value
        header("Location: home2.php"); // redirect the user to the home page
    }

    if(isset($_SESSION["adm"])){ // if a session "adm" is exist and have a value
        header("Location: dashboard.php"); // redirect the admin to the dashboard page
    } 
    
    require_once "db_connect.php";

    $error = false;  // by default, a varialbe $error is false, means there is no error in our form

    function cleanInputs($input){ 
        $data = trim($input); // removing extra spaces, tabs, newlines out of the string
        $data = strip_tags($data); // removing tags from the string
        $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt"; 

        return $data;
    }

    $email = ""; // define variables and set them to empty string
    $emailError = $passError = ""; // define variables that will hold error messages later, for now empty string 

    if(isset($_POST["login"])){
        $email = cleanInputs($_POST["email"]);
        $password = $_POST["password"];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // if the provided text is not a format of an email, error will be true
            $error = true;
            $emailError = "Please enter a valid email address";
        }

        // simple validation for the "password"
        if (empty($password)) {
            $error = true;
            $passError = "Password can't be empty!";
        }

        if(!$error){ // if there is no error with any input, data will be inserted to the database
            // hashing the password before inserting it to the database
            $password = hash("sha256", $password);

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
            // ($row && password_verify($password, $row["password"]))
            
            if(mysqli_num_rows($result) == 1){
                if($row["status"] == "adm"){
                    $_SESSION["adm"] = $row["id"]; // here a new session will be created with the name adm and it will save the user id 
                    header("Location: dashboard.php");
                }else {
                    $_SESSION["user"] = $row["id"]; // here a new session will be created with the name user and it will save the user id 
                    header("Location: home.php");
                }
            }else {
                echo "<div class='alert alert-danger'>
                        <p>Something went wrong, please try again later ...</p>
                      </div>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php" >Login</a>
                </li>
                <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
            </ul>
        </div>
    </nav>
        <div class="container">
            <h1 class="text-center">Login page</h1>
            <form method="post" action="login.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $email ?>">
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="text-danger"><?= $passError ?></span>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Login</button>
                
                <span>Don't have an account? <a href="register.php">register here</a></span>
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