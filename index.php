<?php
session_start();
require_once __DIR__ . "/headfoot/header.php";
require_once "connect.php";
global $connect;
$aboute = mysqli_query($connect,"SELECT * FROM films");

?>
<main>

    <div class="container">
        <h3 class="mt-3">Новинки</h3>
        <hr>
        <div class="movies">
            <?php
            while($about = mysqli_fetch_assoc($aboute)){
                $queri = $about["id_film"];
                $grade = mysqli_query($connect,"SELECT AVG(comment.Оценка) AS reyting FROM comment WHERE id_film='$queri'");
                $grade=mysqli_fetch_assoc($grade);
                ?>
                    <a href="one-movie.php?id=<?= $about['id_film'] ?>" class="card text-decoration-none movies__item">
                        <img src="<?=$about['film_image']?>" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$about['name'];?></h5>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?=sprintf("%.01f",$grade["reyting"])?></span></p>
                            <p class="card-text"><?=$about['description'];?></p>
                        </div>
                    </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . "/headfoot/footer.php";?>
