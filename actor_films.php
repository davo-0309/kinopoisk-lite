<?php
session_start();
require_once __DIR__ . "/headfoot/header.php";
global $connect;
$id_actor = $_GET['id'];
$name = mysqli_query($connect, "SELECT actor_name FROM actors WHERE id_actor = '$id_actor'");
$name = mysqli_fetch_assoc($name);
$name = $name['actor_name'];
$result_films = mysqli_query($connect, "SELECT films.name, films.id_film, films.film_image, films.description, AVG(comment.Оценка) AS Оценка
FROM films_actors
LEFT JOIN films ON films_actors.id_film = films.id_film
inner JOIN actors ON films_actors.id_actor = actors.id_actor
LEFT JOIN comment ON films.id_film = comment.id_film
WHERE actors.actor_name = '$name'
GROUP BY films.id_film;
");
//var_dump(mysqli_fetch_assoc($result_films));
?>


<main>
    <div class="container">
        <h3 class="mt-3"><?=$name?></h3>
        <hr>
        <div class="movies">
            <?php
            while ($actor = mysqli_fetch_assoc($result_films)) {
                ?>
                <a href="one-movie.php?id=<?= $actor['id_film'] ?>" class="card text-decoration-none movies__item">
                    <img src="<?= $actor['film_image'] ?>" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $actor['name']; ?></h5>
                        <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?= sprintf("%.01f",$actor["Оценка"])?></span></p>
                        <p class="card-text"><?= $actor['description']; ?></p>
                    </div>
                </a>
                <?php
            }
            ?>

        </div>
    </div>
</main>
<?php require_once __DIR__ . "/headfoot/footer.php";
?>
