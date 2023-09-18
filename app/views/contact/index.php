<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Контакты</title>
    <meta name="description" content="Страница про кампанию">

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/form.css">

</head>
<body>
<?php require 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Контакты </h1>
    <p>Напишите если есть вопросы</p>
    <form action="/contact" method="post" class="form-control">
        <input type="text" name="name" placeholder="Введите свое имя" value="<?=$this->name?>">
        <input type="email" name="email" placeholder="Введите email получателя" value="<?=$this->email?>">
        <input type="text" name="anons" placeholder="Укажите тему" value="<?=$this->anons?>">
        <textarea name="message" placeholder="Введите само сообщение" value="<?=$this->message?>"></textarea>
        <div class="error"><?=$this->data['message']?></div>
        <div class="error send"><?=$this->data_send['message']?></div>
        <button class="btn" id="send">Отправить</button>
    </form>
</div>

<?php require 'public/blocks/footer.php' ?>
</body>
</html>
