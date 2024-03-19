<?php
session_start();
require_once __DIR__ . "/headfoot/header.php";
require_once "connect.php";
global $connect;
$filmId=$_GET['id'];
$film_actors = mysqli_query($connect, "SELECT actors.* FROM actors 
                                       LEFT JOIN films_actors ON actors.id_actor = films_actors.id_actor 
                                       WHERE films_actors.id_film = '$filmId'");
$film_genres = mysqli_query($connect, "SELECT genre.* FROM genre 
                                       LEFT JOIN genre_film ON genre.id_genre = genre_film.id_genre 
                                       WHERE genre_film.id_film = '$filmId'");
//$film_actors=mysqli_fetch_assoc($film_actors);
//var_dump($film_actors);
$one_movie = mysqli_query($connect, "SELECT * FROM films WHERE $filmId=id_film");
$one_movie=mysqli_fetch_assoc($one_movie);
$comments = mysqli_query($connect, "SELECT * FROM comment WHERE $filmId=id_film");
$gr=$one_movie['id_film'];
$grade = mysqli_query($connect,"SELECT AVG(comment.Оценка) AS reyting FROM comment WHERE id_film ='$gr'");
$grade=mysqli_fetch_assoc($grade);

?>

<main>
    <div class="container">
        <div class="one-movie">
            <div class="card mb-3 mt-3 one-movie__item">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img width="100%"  src="<?=$one_movie['film_image']?>" class="img-fluid rounded one-movie__image" alt="...">
                        <form method="post" action="comment.php?id=<?= $one_movie['id_film'] ?>" class="m-3 w-100">
                            <select name="grade" class="form-select" aria-label="Default select example">
                                <option selected>Оценка</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <div class="form-floating mt-2">
                                <textarea name="comment" class="form-control" placeholder="Укажи свое мнение о фильме" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Комментарий</label>
                            </div>
                            <?php
                            if ($_SESSION['validation']['comment']){
                                ?>
                                <small><?=$_SESSION['validation']['comment']?></small>
                                <?php
                            }
                            ?>
                            <button type="submit" class="btn btn-primary mt-2">Оставить отзыв</button>

                        </form>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title"><?=$one_movie['name']?></h1>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?=sprintf("%.01f",$grade["reyting"])?></span></p>
                            <p class="card-text"><?=$one_movie['description']?></p>
                            <p class="card-text"><small class="text-body-secondary">Добавлен 24/12/2023</small></p>
                            <p class="card-text">В ролях.
                                <?php
                                    while ($actname = mysqli_fetch_assoc($film_actors)){
                                ?>
                                <a style="display: inline-block" class="nav-link text-white" href="actor_films.php?id=<?=$actname['id_actor']?>"><?=$actname['actor_name']?>,</a>
                                <?php
                                    }
                                    ?>
                            </p>
                            <p class="card-text">Жанры.
                                <?php
                                while ($genrename = mysqli_fetch_assoc($film_genres)){
                                    ?>
                                    <a style="display: inline-block" class="nav-link text-white" href="category.php?name=<?=$genrename['name_genre']?>"><?=$genrename['name_genre']?>,</a>
                                    <?php
                                }
                                ?>
                            </p>
                            <h4>Отзывы</h4>
                            <div class="one-movie__reviews">
                                <?php
                                while ($comment = mysqli_fetch_assoc($comments)){
                                ?>
                                    <div class="card">
                                        <div class="card-header">
                                            Пользователь: <?=$comment['Пользователь']?>
                                        </div>
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p><?=$comment['Комментарий']?></p>
                                                <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge"><?=$comment['Оценка']?></span></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . "/headfoot/footer.php";?>