<header>
    <div class="container top-menu">
        <div class="logo">
            <img src="/public/img/logo.png" alt="Logo">
            <h2>Обрежем все лишнее!</h2>
        </div>
        <div class="nav">
            <a href="/home">Главная</a>
            <a href="/contact">Контакты</a>
            <a href="/contact/about">Про компанию</a>
            <?php if(isset($_COOKIE['login'])) : ?>
            <a href="/user/dashboard">Личный кабинет</a>
            <?php else : ?>
            <a href="/user/dashboard">Войти</a>
            <?php endif; ?>
        </div>
    </div>

</header>
