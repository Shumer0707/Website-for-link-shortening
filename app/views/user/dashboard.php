<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Кабинет пользователя">

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
<?php require 'public/blocks/header.php' ?>

<div class="container main">

    <div class="user-info">
        <?php if(!isset($this->data_user['login'])) : ?>
        <h1>Авторизация</h1>
        <p>Здесь вы можете авторизоваться на сайте</p>
        <form action="/user/dashboard" method="post" class="form-control">
            <input type="text" name="login" placeholder="Введите login" value="<?=$this->value['login']?>"><br>
            <input type="password" name="pass" placeholder="Введите пароль" value="<?=$this->value['pass']?>"><br>
            <div class="error"><?=$this->data['message']?></div>
            <button class="btn" id="send">Готово</button>
        </form>
        <?php else : ?>
        <h1>Кабинет пользователя!</h1>
        <p><b>Привет, <?=$this->data_user['login']?></b></p>
        <form action="/user/dashboard" method="post">
            <input type="hidden" name="exit_btn">
            <button type="submit" class="btn">Выйти</button>
        </form>
        <?php endif; ?>
    </div>
</div>

<?php require 'public/blocks/footer.php' ?>
</body>
</html>
