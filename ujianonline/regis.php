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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>
      <?php include "css/popup.css" ?>
    </style>

      <title>Test By</title>
        <link rel="shortcut icon" href="Aset/logo.png" type="image/x-icon">
  </head>
  <body>
      <div class="signup">
      <h1>Lets Register Account</h1>
      <p>Hello user, you have a greatful journey</p>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">First Name : </label>
      <input type="text" name="first_name" id = "first_name" required value="" placeholder="First Name"> <br>
      <label for="name">Last Name : </label>
      <input type="text" name="last_name" id = "last_name" required value=""> <br>
      <label for="username">Gender : </label>
      <input type="text" name="gender" id = "gender" required value=""> <br>
      <label for="username">Mobile Phone : </label>
      <input type="text" name="mobile" id = "mobile" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit" href="login.php">Register</button>
      <p>Already have an account? <a class="pop" href="login.php">Sign In</a></p>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $first_name=htmlspecialchars($_POST['first_name']);
            $last_name=htmlspecialchars($_POST['last_name']);
            $gender=htmlspecialchars($_POST['gender']);
            $mobile=htmlspecialchars($_POST['mobile']);
            $email=htmlspecialchars($_POST['email']);
            $password=htmlspecialchars($_POST['password']);
            $role="user";
            //$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = mysqli_query($db, "SELECT email FROM online_exam_user WHERE email = '$email'");
            $count = mysqli_num_rows($query);

            if($count>0){
                echo "email sudah terdaftar";
            }else{
                $queryInsert = mysqli_query($db, "INSERT INTO online_exam_user(first_name, last_name, gender, email, password, mobile,role) VALUES ('$first_name', '$last_name', '$gender', '$email', '$password', '$mobile', '$role')");
                //var_dump($queryInsert);
                if($queryInsert){
                   echo "register Succsess";
                }
            }
            
        }
    ?>
      </div>
  </body>
</html>
