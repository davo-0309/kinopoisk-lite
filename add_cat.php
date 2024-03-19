<?php

require_once "connect.php";
require_once "helpers.php";
global $connect;

$genre_flm = $_POST['add_genre'];
$genre_type = $_POST['genre_type'];

$get_film_id = mysqli_query($connect, "SELECT id_film FROM films WHERE name ='$genre_flm'");
$get_film_id = mysqli_fetch_assoc($get_film_id);
$get_film_id = $get_film_id['id_film'];


$get_genre_id = mysqli_query($connect, "SELECT id_genre FROM genre WHERE name_genre ='$genre_type'");
$get_genre_id = mysqli_fetch_assoc($get_genre_id);
$get_genre_id = $get_genre_id['id_genre'];



$add_film_genre = mysqli_query($connect, "INSERT INTO `genre_film` (`id`, `id_genre`, `id_film`) VALUES (NULL, '$get_genre_id', '$get_film_id')");

if(empty($genre_flm) || empty($genre_type)){

}
else {
    $add_film_genre;
    redirect('admin.php');

}