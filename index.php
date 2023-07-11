<?php
error_reporting(-1);

session_start();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/funcs.php';

if(isset($_POST['register'])){
    registration();
    header("Location: index.php");
    die;
}
if(isset($_POST['auth'])){
    login();
    header("Location: index.php");
    die;
}
$messages = get_messages();


if(isset($_POST['add'])){
    save_message();
    header("Location: index.php");
    die;
}

if(isset($_GET['do']) && $_GET['do'] == 'exit'){
    if(!empty($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    header("Location: index.php");
    die;
}
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
            <?php if (!empty($_SESSION['errors'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['errors'];
                unset($_SESSION['errors']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php if (empty($_SESSION['user']['name'])): ?>
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



<?php else: ?>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['name'])?>! <a href="?do=exit">Log out</a></p>
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

    <?php endif;?>

    <?php if(!empty($messages)):?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <hr>
            <?php foreach($messages as $message): ?>
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Автор: <?= htmlspecialchars($message['name'])?></h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($message['message']))?></p>
                    <p>Дата: <?= $message['created_at']?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
