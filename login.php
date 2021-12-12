<?php
    session_start();
    if(isset($_SESSION['auth']) && $_SESSION['auth']){
        $isAuthorized = true;
    }else{
        $isAuthorized = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<div class="container">
    <?php if(!$isAuthorized):?>
   <h3>Login</h3>
   <form action="auth.php" method="post" enctype="multipart/form-data">
       <div class="row">
           <div class="field">
               <label>Email: <input type="email" name="email"></label>
           </div>
       </div>
       <div class="row">
           <div class="field">
               <label>Password: <input type="password" name="pwd"><br></label>
           </div>
       </div>
       <input type="submit" name="submit" class="btn" value="Login">
   </form>
   <?php else:?>
    <div class="is-authorized-box">
        <h3>You are authorized.</h3>
        <button class='btn logout-btn'><a href="logout.php">Logout</a></button>
        <button class='btn logout-btn'><a href="adduser.php">Add user</a></button>
        <button class='btn logout-btn'><a href="table.php">Go to list</a></button>
    </div>
    <?php endif;?>
</div>
</body>
</html>