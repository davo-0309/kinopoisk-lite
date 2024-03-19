<?php
require_once __DIR__ . "/headfoot/header.php";
require_once "connect.php";
global $connect;
$genres_query = mysqli_query($connect, "SELECT genre.*, COUNT(genre_film.id_film) AS film_count
                                        FROM genre
                                        LEFT JOIN genre_film ON genre.id_genre = genre_film.id_genre
                                        GROUP BY genre.id_genre");

?>

    <main>
        <div class="container">
            <h3 class="mt-3">Жанры</h3>
            <hr>
            <div class="movies">
                <?php
                while ($genre = mysqli_fetch_assoc($genres_query)) {
                    ?>
                    <a href="<?= 'category.php?name=' . $genre['name_genre']; ?>" class="card text-decoration-none movies__item">
                        <img src="<?= $genre['image'] ?>" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $genre['name_genre'] ?></h5>
                            <p class="card-text">Фильмов <span class="badge bg-info warn__badge"><?= $genre['film_count'] ?></span></p>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>

<?php require_once __DIR__ . "/headfoot/footer.php";?>