<?php
session_start();
require_once "helpers.php";
//require_once "header.php";
require_once __DIR__ . "/headfoot/header.php";
?>

<main>
    <div class="container">
        <h3 class="mt-3">Регистрация</h3>
        <hr>
    </div>
    <div class="container d-flex justify-content-center">


        <form method="post" action="registration.php" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input aria-invalid="true" name="name" type="text" class="form-control" id="name" placeholder="Иван Иванов">
                        <label for="name">Имя</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input aria-invalid="true" name="email" type="email" class="form-control" id="email" placeholder="name@areaweb.su">
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input aria-invalid="true" name="password" type="password" class="form-control" id="password" placeholder="*********">
                        <label for="password">Пароль</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input aria-invalid="true" name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="*********">
                        <label for="password_confirmation">Подтверждение</label>
                    </div>
                </div>
            </div>
            <small><?php echo $_SESSION['validation']['reg']?></small>
            <div class="row g-2">
                <button type="submit" class="btn_imm btn_my btn btn-primary">Создать аккаунт</button>
            </div>
        </form>
    </div>
</main>

<?php require_once __DIR__ . "/headfoot/footer.php";?>