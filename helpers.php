<?php
//session_start();


function redirect($path){
    header("location: $path");
    die();
}
