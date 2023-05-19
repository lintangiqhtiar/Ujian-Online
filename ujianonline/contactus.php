<?php 
include_once 'config/Database.php';
include_once 'class/User.php';
//require "config/config.php";
//require "class/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--bootstraps-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>

        <title>Test By</title>
        <style>
            <?php include "css/style.css"?>
             <?php include "css/popup.css"?>
        </style>
        <link rel="shortcut icon" href="Aset/logo.png" type="image/x-icon">
    </head>
    <body class="contact">
        <div class="header">
            <a href="index.php" class="logo">
                <img src="Aset/logo.png" alt="">
            </a>
            <div class="header-right">
              <a  href="index.php">Home</a>
              <a class="active" href="contactus.php">Contact</a>
              <a href="login.php">Login</a>
              <a  href="regis.php">Get Started</a>
          </div>
        </div>
        <div class="contactus">
            <h1>Contact Us</h1>
            <p>Some contact information on how to reach out</p>
            <div>
                <form action="" method="post">
                  <label for="fname"></label>
                  <input type="text" id="name" name="name" placeholder="Name">
                  <label for="lname"></label>
                  <input type="text" id="email" name="email" placeholder="Email">
                  <label for="lname"></label>
                  <input type="text" id="message" name="message" placeholder="Message">
                    <br><br>
                  <input type="submit" name="submit" value="submit">
                </form>

                <?php
                if(isset($_POST['submit'])){
                    $name=htmlspecialchars($_POST['name']);
                    $email=htmlspecialchars($_POST['email']);
                    $message=htmlspecialchars($_POST['message']);

                   //$sql= "SELECT * FROM `online_exam_message`";

                    $queryInsert = mysqli_query($db, "INSERT INTO online_exam_message (name, email, message) VALUES ('$name', '$email', '$message')");
                    var_dump($queryInsert);

                }
                ?>
              </div>
        </div>
    </body>
    <footer></footer>
</html>