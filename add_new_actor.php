<?php
//require_once "connect.php";
//require_once "helpers.php";
require_once 'connect.php';
require_once 'helpers.php';
global $connect;
$name_actor=$_POST['name_actor'];
$actor_image=$_POST['actor_image'];
$add_new_actor = mysqli_query($connect, "INSERT INTO `actors` (`id_actor`, `actor_name`, `actor_image`) VALUES (NULL, '$name_actor', '$actor_image')");
if(!$name_actor || !$actor_image){

    redirect('admin.php');
}
else {
    $add_new_actor;
    redirect('admin.php');
//    echo "aaa";
}
