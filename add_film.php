<?php
require_once "connect.php";
global $connect;

$name = $_POST['name'];
$film_image = $_POST['film_image'];
$description = $_POST['description'];

$add_film = mysqli_query($connect, "INSERT INTO `films` (`id_film`, `name`, `film_image`, `description`) VALUES (NULL, '$name', '$film_image', '$description')");

if (!$name || !$film_image || !$description) {
    header("location: admin.php");
} else {
    $add_film;
    header("location: admin.php");
}
?>





