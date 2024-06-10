<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О магазине "Clothing & Style"</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header>
        <div class="headline"> 
            <div class="logo" onclick="goToHome()"> 
                <img src="img/icons/logo.png" alt="Логотип Магазина"> 
                <h1>Одежда и аксессуары для вашего образа</h1> 
            </div> 
            <div class="contact-info"> 
                <p>Телефон: +7 (XXX) XXX-XX-XX</p> 
                <img src="img/icons/arrow.png" alt="Стрелка" onclick="showContactInfo()"> 
            </div>
        </div>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <nav id="mobile-nav">
            <ul>
                <<li><a href="catalog.php#female-category">Для женщин</a></li> 
                <li><a href="catalog.php#male-category">Для мужчин</a></li> 
                <li><a href="catalog.php#acc-category">Аксессуары</a></li> 
                <li><a href="index.php#new-products">Новинки</a></li>
                <li><a href="info.php">О нас</a></li>
            </ul>
        </nav>

        <nav> 
            <ul> 
                <li><a href="catalog.php#female-category">Для женщин</a></li> 
                <li><a href="catalog.php#male-category">Для мужчин</a></li> 
                <li><a href="catalog.php#acc-category">Аксессуары</a></li> 
                <li><a href="index.php#new-products">Новинки</a></li>
                <li><a href="info.php">О нас</a></li>   
            </ul> 
        </nav>
    </header> 
    
    <div id="contact-modal" class="modal">  
        <div class="modal-content"> 
            <span class="close" onclick="closeContactInfo()">&times;</span> 
            <h2>Контакты</h2> 
            <p>Телефон: +7 (XXX) XXX-XX-XX</p> 
            <p>Адрес: г. Ростов-на-Дону, ул. Улица, д. 42</p> 
            <p>Email: info@gmail.com</p> 
            <p>График работы: Пн-Пт: 9:00-18:00, Сб-Вс: выходной</p>
            <a href="https://api.whatsapp.com/send?phone=+79888951263">
                <img src="img/icons/whatsapp.png" alt="WhatsApp">
            </a> 
        </div> 
    </div> 

    <section class="about-shop">
        <div class="title"> 
            <h1>О нас</h1>
        </div>  
        <div class="about-shop-info"> 
            <h2>Добро пожаловать в "Clothing & Style" – ваш лучший партнер в мире моды и стиля!</h2> 
            <p>Мы - компания "Clothing & Style", занимаемся созданием стильной и модной одежды с 2023 года.</p> 
            <p>Мы гордимся тем, что помогаем нашим клиентам выражать свою уникальность через моду, предоставляя широкий ассортимент стильной и качественной одежды.</p> 
            <p>Мы стремимся к постоянному совершенствованию и развитию, следуя последним тенденциям в мире моды.</p>
            <h2>Наша Миссия</h2> 
            <p>В "Clothing & Style" мы стремимся сделать моду доступной и вдохновляющей для всех.</p>
            <p>Наша миссия состоит в том, чтобы помочь каждому клиенту обнаружить свой собственный стиль, выразить себя через одежду и чувствовать себя уверенно в любой обстановке.</p>
            <p>Будьте уверены, что при выборе нашего магазина вы делаете правильный шаг к созданию вашего неповторимого стиля. Доверьтесь нам, и мы сделаем шоппинг приятным и незабываемым!<p>
        </div>  
    </section> 
 
    <section class="contact-shop"> 
        <div class="contact-shop-text"> 
            <h2>Если у вас остались вопросы или вы хотите получить дополнительную информацию, вы можете связаться с нами через WhatsApp.</h2> 
        </div> 
        <div class="contact-shop-banner">
            <div class="contact-background"></div>  
            <a href="https://api.whatsapp.com/send?phone=+79888951263" class="contact-shop-btn">Свяжитесь с нами!</a> 
        </div> 
    </section>

    <footer> 
        <div class="contact"> 
            <h3>Контакты</h3> 
            <p>Адрес: г. Ростов-на-Дону, ул. Улица, д. 42</p> 
            <p>Телефон: +7 (XXX) XXX-XX-XX</p> 
            <p>Email: info@gmail.com</p> 
            <a href="https://api.whatsapp.com/send?phone=+79888951263">
                <img src="img/icons/whatsapp.png" alt="WhatsApp">
            </a>  
        </div> 
    </footer> 

    <script src="js/script.js"></script>

</body>
</html>