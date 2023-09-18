<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Про нас</title>
    <meta name="description" content="Страница про кампанию">

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/ec45053718.js" crossorigin="anonymous">

</head>
<body>
<?php require 'public/blocks/header.php' ?>

        <div class="container main">
        <?php
        if (($this->some != '')){
        echo "<h3> Неопознаный URL: $this->some</h3>";
        }
        ?>
            <h1>Про кампанию</h1>
        <p>Текст про кампанию</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, repellat sunt.
            Doloremque facilis fugit hic numquam quaerat, velit voluptate voluptates!</p>
        </div>

<?php require 'public/blocks/footer.php' ?>
</body>
</html>
