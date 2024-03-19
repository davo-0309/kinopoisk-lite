<?php
require_once __DIR__ . "/headfoot/header.php";
require_once "connect.php";
global $connect;
$name = $_GET['name'];
$result_films = mysqli_query($connect, "SELECT films.name, films.id_film, films.film_image, films.description, genre.name_genre, AVG(comment.Оценка) AS Оценка
FROM genre_film
LEFT JOIN films ON genre_film.id_film = films.id_film
LEFT JOIN genre ON genre_film.id_genre = genre.id_genre
LEFT JOIN comment ON films.id_film = comment.id_film
WHERE genre.name_genre = '$name'
GROUP BY films.id_film;
");



?>
<main>
    <div class="container">
        <h3 class="mt-3"><?=$name?></h3>
        <hr>
        <div class="movies">
            <?php
            while ($cat = mysqli_fetch_assoc($result_films)) {
                ?>
                <a href="one-movie.php?id=<?= $cat['id_film'] ?>" class="card text-decoration-none movies__item">
                    <img src="<?= $cat['film_image'] ?>" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cat['name']; ?></h5>
                        <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?= sprintf("%.01f",$cat["Оценка"])?></span></p>
                        <p class="card-text"><?= $cat['description']; ?></p>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . "/headfoot/footer.php";?>
