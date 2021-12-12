<?php
filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

const ADMIN_EMAIL = 'admin@admin.com';
const ADMIN_PASSWORD = '111111';

session_start();
if($_POST['email'] == ADMIN_EMAIL && $_POST['pwd'] == ADMIN_PASSWORD){
    $_SESSION['auth'] = true;
    header('Location: adduser.php');
    exit();
}else{
    header('Location: login.php');
    exit();
}