<?php
session_start();
require_once "connect.php";
require_once __DIR__ . "/headfoot/header.php";
global $connect;
$best = mysqli_query($connect, "SELECT films.*, AVG(comment.Оценка) AS average_rating
                                FROM films
                                LEFT JOIN comment ON films.id_film = comment.id_film
                                GROUP BY films.id_film
                                ORDER BY average_rating DESC");

?>
<main>
    <div class="container">
        <h3 class="mt-3">Фильмы по оценкам</h3>
        <hr>
        <div class="movies">
            <?php
            while ($theBest = mysqli_fetch_assoc($best)) {
                $formatted_rating = sprintf("%.1f", $theBest['average_rating']);
                ?>
                <a href="one-movie.php?id=<?= $theBest['id_film'] ?>" class="card text-decoration-none movies__item">
                    <img src="<?= $theBest['film_image'] ?>" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $theBest['name']; ?></h5>
                        <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?= $formatted_rating ?></span></p>
                        <p class="card-text"><?= $theBest['description']; ?></p>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . "/headfoot/footer.php";?>
