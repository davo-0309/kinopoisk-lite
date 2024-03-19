<?php
session_start();
require_once 'W:/domains/untitled/kinopoisk-lite/headfoot/header.php';
require_once 'W:/domains/untitled/kinopoisk-lite/connect.php';
//require_once __DIR__ ."/connect.php";
global $connect;
$name_genre = mysqli_query($connect, "SELECT name_genre FROM genre");
$name_film = mysqli_query($connect, "SELECT name FROM films");
$name2 = mysqli_query($connect, "SELECT name FROM films");
$actor_name = mysqli_query($connect, "SELECT actor_name FROM actors")
?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/app.css">

    <main>
        <div class="container">
            <h3 class="mt-3">Панель администрирования</h3>
            <hr>
            <div class="align-items-center justify-content-between mb-4">
                <h4>Фильмы</h4>
                <form method="post" action="add_film.php">
                    <input name="name" placeholder="Название фильма" class="add_f" type="text" required>
                    <input name="film_image" placeholder="Постер" class="add_f" type="text" required>
                    <input name="description" placeholder="Описание" class="add_f" type="text" required>

                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        <span>Добавить</span>
                    </button>
                </form>
            </div>
            <div class="container">
                <form method="post" action="add_cat.php">
                    <select name="add_genre" class="genre_sel form-select" aria-label="Default select example" required>
                        <option value="">Фильм</option>
                        <?php
                        while ($name = mysqli_fetch_assoc($name_film)) {
                            ?>
                            <option value="<?= $name['name'] ?>"><?= $name['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="genre_type" class="genre_sel form-select" aria-label="Default select example"
                            required>
                        <option value="">Жанр</option>
                        <?php
                        while ($name = mysqli_fetch_assoc($name_genre)) {
                            ?>
                            <option value="<?= $name['name_genre'] ?>"><?= $name['name_genre'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        <span>Добавить</span>
                    </button>

                </form>
            </div>
            <hr>
                <h4>Жанры</h4>
                <form method="post" action="add_new_genres.php">
                    <input name="name_genre" placeholder="Название жанра" class="add_f" type="text" required>
                    <input name="genre_image" placeholder="Постер" class="add_f" type="text" required>
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        <span>Добавить</span>
                    </button>
                </form>
            <hr>








            <h4>Актеры</h4>
            <form method="post" action="add_new_actor.php">
                <input name="name_actor" placeholder="Имя актера" class="add_f" type="text" required>
                <input name="actor_image" placeholder="Фото актера" class="add_f" type="text" required>
                <button class="btn btn-primary d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    <span>Добавить</span>
                </button>
            </form>
            <br>



            <div class="container">
                <form method="post" action="add_actor_to_film.php">
                    <select name="add_actor" class="genre_sel form-select" aria-label="Default select example" required>
                        <option value="">Фильм</option>
                        <?php
                        while ($name = mysqli_fetch_assoc($name2)) {
//                            var_dump($name);
                            ?>
                            <option value="<?= $name['name'] ?>"><?= $name['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="actor_type" class="genre_sel form-select" aria-label="Default select example"
                            required>
                        <option value="">Актер</option>
                        <?php
                        while ($name = mysqli_fetch_assoc($actor_name)) {
                            ?>
                            <option value="<?= $name['actor_name'] ?>"><?= $name['actor_name'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        <span>Добавить</span>
                    </button>

                </form>
            </div>
        </div>
    </main>

<?php require_once 'W:/domains/untitled/kinopoisk-lite/headfoot/footer.php';?>

