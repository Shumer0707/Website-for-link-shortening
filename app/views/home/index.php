<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главнвя страница</title>
    <meta name="description" content="Главнвя страница интернет магазина">

    <link rel="stylesheet" href="/public/css/main.css ">
    <link rel="stylesheet" href="/public/css/form.css">


</head>
<body>

    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Сокра.тим</h1>
        <div class="form">
            <?php if(!isset($this->user_login['login'])) : ?>
                <p>Нужно сократить ссылку? Регистрируйся</p>
                <form action="/" method="post" class="form-control">
                    <input type="text" name="login" placeholder="Введите логин" value="<?=$this->value['login']?>">
                    <input type="email" name="email" placeholder="Введите email" value="<?=$this->value['email']?>">
                    <input type="password" name="pass" placeholder="Укажите пароль" value="<?=$this->value['pass']?>">
                    <div class="error"><?=$this->data['message']?></div>
                    <button class="btn" id="send">Отправить</button>
                </form>
            <?php else : ?>
                <p><b><?=$this->user_login['login']?></b> введите длинную и короткую ссылку.</p>
                <form action="/" method="post" class="form-control">
                    <input type="text" name="link" placeholder="Длинная ссылка" value="">
                    <input type="text" name="token" placeholder="Короткая" value="">
                    <div class="error"><?=$this->data['link']?></div>
                    <div class="error send"><?=$this->data_send?></div>
                    <button class="btn" id="send">Создать</button>
                </form>
            <?php endif; ?>
        </div>
        <div class="info">
            <?php if(isset($this->getAllToken)) : ?>
                <?php for($i = 0; $i < count($this->getAllToken); $i++): ?>
                    <div class="link">
                        <h4>Длинная ссылка: <?=$this->getAllToken[$i]['link']?></h4>
                        <h4>Короткая ссылка: http://localhost/l/<?=$this->getAllToken[$i]['token']?></h4>
                            <form action="home/delete/<?=$this->getAllToken[$i]['id']?>/<?=$this->getAllToken[$i]['id_user']?>" method="post">
                            <input type="hidden" name="delete?>">
                            <button type="submit" class="btn delete">Удалить</button>
                        </form>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
        <?php require 'public/blocks/footer.php' ?>
</body>
</html>