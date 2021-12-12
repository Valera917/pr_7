<?php
   filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body style="padding-top: 3rem;">
 
<div class="container">
   <?php

   echo "<div class='invalid-msg'>";
      require 'uploads.php';
      require 'db.php';
   echo "</div>";

   if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["gender"])){
      echo "<span class='invalid-msg'>Invalid Data<span>";
   }else{

      $name = $_POST["name"];
      $email = $_POST["email"];
      $gender = $_POST["gender"];

      echo "<br>User Added ".$name."<br>";
      echo "Email ".$email."<br>";
      echo "Gender ".$gender."<br>";
      echo "Filepath ".$filePath."<br>";

      $sql = "INSERT INTO users (email, name, gender, password, path_to_img)
               VALUES ('$email', '$name','$gender', '11111', '$filePath')";
      $res = mysqli_query($conn, $sql);
      if ($res) {
         echo "Succesfully added.<br>";
      }
   }?>
   <hr>
   <a class="btn" href="adduser.php">return back</a>
   <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>
