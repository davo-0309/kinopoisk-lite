<?php
session_start();
require_once "helpers.php";
require_once 'connect.php';
global $connect;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$_SESSION['validation']=[];
if(empty($name) || empty($email) || empty($password) || empty($password_confirmation)){
    $_SESSION['validation']['reg']="Пожалуйста, заполните все поля";
}
if(!empty($_SESSION['validation'])){
    redirect('register.php');
}
if ($password == $password_confirmation && strlen($name) > 2) {
    $stmt = $connect->prepare("INSERT INTO `users` (`name`, `email`, `password`, `roll`) VALUES (?, ?, ?, NULL)");
    $stmt->bind_param("sss", $name, $email, $hash);

    if ($stmt->execute()) {
        redirect('login.php');
    } else {
        $_SESSION['validation']['reg']="Неправильные данные";
        redirect('register.php');
    }

    $stmt->close();
} else {
    $_SESSION['validation']['reg']="Неправильные данные";
    redirect('register.php');

}

?>
