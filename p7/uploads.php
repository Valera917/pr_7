<?php
    $target_dir = "public/images/";
    $target_file = $target_dir.basename($_FILES["photo"]["name"]);
    $isUploaded = false;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filePath = '';

    if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
    	    $isUploaded = true;
	    } else {
            echo "File is not an image.<br>";
    	    $isUploaded = false;
	    }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
	    $isUploaded = false;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
	    $isUploaded = false;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry,only JPG, JPEG, PNG & GIF files are allowed.<br>";
	    $isUploaded = false;
    }
    // Check if $isUploaded is false by an error
    if (!$isUploaded) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $filePath = $target_dir . basename($_FILES["photo"]["name"]);
	    } else {
          echo "Sorry, there was an error uploading your file.<br>";
	    }
    }
?>
