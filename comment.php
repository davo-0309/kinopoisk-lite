<?php
session_start();
require_once "connect.php";
require_once "helpers.php";
global $connect;

$id_film = $_GET['id'];

// Check if user or admin is logged in
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : $_SESSION['admin'];

    // Validate inputs
    $grade = isset($_POST['grade']) ? $_POST['grade'] : null;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : null;

    if ($grade && $comment) {
        $stmt = $connect->prepare("INSERT INTO `comment` (`id`, `Пользователь`, `Оценка`, `Комментарий`, `id_film`) VALUES (NULL, ?, ?, ?, ?)");
        $stmt->bind_param("sssi", $user, $grade, $comment, $id_film);

        // Execute the statement
        if ($stmt->execute()) {
            redirect("one-movie.php?id=$id_film");
        } else {
            echo 'Error occurred while inserting data.';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 'Invalid input.';
    }
} else {
    $_SESSION['validation']['comment']='Войдите в аккаунт чтобы оставить отзыв';
    redirect("one-movie.php?id=$id_film");
}
