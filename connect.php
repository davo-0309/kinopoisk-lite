<?php
$server = "localhost";
$login = "root";
$password = "root";
$db_name = "kinopoisk";
$connect = new mysqli($server, $login, $password, $db_name);

if($connect == false){
    echo "ne udalos";
}
//echo "udalos";
?>