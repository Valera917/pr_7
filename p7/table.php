<?php
    require 'db.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $users[] = [
               'name' => $row['name'],
               'email' => $row['email'],
               'gender' => $row['gender'],
               'filepath'=>$row['path_to_img']
           ];
       }
    }    
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
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>File path</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i = 0; $i < count($users); $i++){
                        $imagesrc = (empty(trim($users[$i]['filepath']))) ? 'public/images/default/default-img.jpg' : $users[$i]['filepath'];
                        echo "<tr>
                                <td>".$users[$i]['name']."</td>
                                <td>".$users[$i]['email']."</td>
                                <td>".$users[$i]['gender']."</td>
                                <td><img src='".$imagesrc."' width='150' height='100'></td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>