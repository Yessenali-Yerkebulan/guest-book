<?php
error_reporting(-1);

require_once __DIR__ . '/db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row my-3">
        <div class="col">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Errors...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Success...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Регистрация</h3>
        </div>
    </div>

    <form action="index.php" method="post" class="row g-3">
        <div class="col-md-6 offset-md-3">
            <div class="form-floating mb-3">
                <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Имя">
                <label for="floatingInput">Имя</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword"
                       placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" name="register" class="btn btn-primary">Зарегистрироваться</button>
        </div>
    </form>

    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <h3>Авторизация</h3>
        </div>
    </div>

    <form action="index.php" method="post" class="row g-3">
        <div class="col-md-6 offset-md-3">
            <div class="form-floating mb-3">
                <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Имя">
                <label for="floatingInput">Имя</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword"
                       placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" name="auth" class="btn btn-primary">Войти</button>
        </div>
    </form>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p>Добро пожаловать, User! <a href="?do=exit">Log out</a></p>
        </div>
    </div>


    <form action="index.php" method="post" class="row g-3 mb-5">
        <div class="col-md-6 offset-md-3">
            <div class="form-floating">
                <textarea class="form-control" name="message" placeholder="Leave a comment here"
                          id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Сообщение</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" name="add" class="btn btn-primary">Отправить</button>
        </div>
    </form>


    <div class="row">
        <div class="col-md-6 offset-md-3">
            <hr>
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Автор: User</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis distinctio
                        est illum in ipsum nemo nostrum odit optio quibusdam velit. Commodi dolores dolorum ex facere
                        maiores porro, reprehenderit velit voluptatum.</p>
                    <p>Дата: 01.01.2000</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
