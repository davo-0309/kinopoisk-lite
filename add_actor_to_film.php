<?php
require_once "connect.php";
require_once "helpers.php";
global $connect;

$actor_flm = $_POST['add_actor'];
$actor_type = $_POST['actor_type'];

if (!empty($actor_flm) && !empty($actor_type)) {
    $get_film_id = mysqli_query($connect, "SELECT id_film FROM films WHERE name ='$actor_flm'");
    $get_film_id = mysqli_fetch_assoc($get_film_id);
    $get_film_id = $get_film_id['id_film'];

    $get_actor_id = mysqli_query($connect, "SELECT id_actor FROM actors WHERE actor_name ='$actor_type'");
    $get_actor_id = mysqli_fetch_assoc($get_actor_id);
    $get_actor_id = $get_actor_id['id_actor'];

    $add_film_actor = mysqli_query($connect, "INSERT INTO `films_actors` (`id`, `id_film`, `id_actor`) VALUES (NULL, '$get_film_id', '$get_actor_id')");

    if ($add_film_actor) {
        redirect('admin.php');
    } else {
        echo "Ошибка: " . mysqli_error($connect);
    }
} else {

}

