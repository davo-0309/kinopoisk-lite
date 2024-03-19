<?php
session_start();
require_once 'connect.php';
require_once "helpers.php";
global $connect;

$email = $_POST['email'];
$password = $_POST['password'];
$user_query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($user_query);
$_SESSION['validation']= [];
if(empty($email) || empty($password)){
    $_SESSION['validation']['name'] = "Пожалуйста, заполните все поля";
}
if(!empty($_SESSION['validation'])){
    redirect('login.php');
}

if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION["user"] = $user['name'];
            $_SESSION['email']= $user['email'];
            if ($user['roll'] === 'admin') {
                redirect('admin.php');
            }else{
                redirect('index.php');
            }

        } else {
            $_SESSION['validation']['name'] = "Неверный пароль/логин";
            redirect('login.php');
        }

} else {
    $_SESSION['validation']['name'] = "Неверный пароль/логин";
    redirect('login.php');
}






?>



