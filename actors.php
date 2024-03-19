<?php
session_start();
require_once __DIR__ . "/headfoot/header.php";
global $connect;
$actors = mysqli_query($connect, "SELECT actors.* FROM actors
                                        LEFT JOIN films_actors ON actors.id_actor = films_actors.id_actor
                                        GROUP BY actors.id_actor")

?>
<main>
    <div class="container">
        <h3 class="mt-3">Актеры</h3>
        <hr>
        <div class="movies">
            <?php
            while($actor = mysqli_fetch_assoc($actors)){

                ?>
                <a href="actor_films.php?id=<?= $actor['id_actor'] ?>" class="card text-decoration-none movies__item">
                    <img src="<?=$actor['actor_image']?>" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$actor['actor_name'];?></h5>

                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<?php
require_once __DIR__ . "/headfoot/footer.php"; ?>










