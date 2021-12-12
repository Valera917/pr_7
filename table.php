<?php

$fp = fopen('database/users.csv', 'a');
		
$data = file_get_contents('database/users.csv');		

$user[] = explode(" ",$data);


 for($i = 0; $i < count($user[0]); $i++) {
      $users[] = [
	'name' => explode(",",$user[0][$i])[0],
	'email' => explode(",",$user[0][$i])[1],
	'gender' => explode(",",$user[0][$i])[2],
	'path'=> !empty(explode(",",$user[0][$i])[3])?"public/images/" . explode(",",$user[0][$i])[3]:'public/images/test.jpg'
];
    }


	fclose($fp);
?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">
 <h3>Таблица пользователей</h3>
<div class="container">
    <?php

    for($i = 0; $i < count($users) - 1; $i++) {
         print_r($users[$i]['name'] . " \n " . $users[$i]['email'] . " \n " . $users[$i]['gender'] . "\n" .   "<img height='50px' src='" . $users[$i]['path'] ."'>" ) .  "<br>";
         echo "<hr>";
    }
	
	
    ?> 
 <a class="btn" href="adduser.php">return back</a>
</div>
</body>
</html>