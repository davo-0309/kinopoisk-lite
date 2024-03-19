<?php
require_once "connect.php";
require_once "helpers.php";
global $connect;
$name_genre=$_POST['name_genre'];
$genre_image=$_POST['genre_image'];
$add_new_genre = mysqli_query($connect, "INSERT INTO `genre` (`id_genre`, `name_genre`, `image`) VALUES (NULL, '$name_genre', '$genre_image')");
if(!$name_genre || !$genre_image){

//    redirect('admin.php');
}
else {
    $add_new_genre;
//    redirect('admin.php');
    echo "aaa";
}
