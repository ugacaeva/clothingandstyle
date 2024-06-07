<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing & Style</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
        require_once "connect.php";
        $dbname = "clothingandstyle_db";
        if (!$conn->select_db($dbname)) { 
            die("Ошибка выбора базы данных: " . $conn->error); 
        }
    ?>

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
        <nav> 
            <ul> 
                <li><a href="catalog.php#female-category">Для женщин</a></li> 
                <li><a href="catalog.php#male-category">Для мужчин</a></li> 
                <li><a href="catalog.php#acc-category">Аксессуары</a></li> 
                <li><a href="home_page.php#new-products">Новинки</a></li>
                <li><a href="info.php">О нас</a></li>   
            </ul> 
        </nav>
    </header> 

    <div id="contact-modal" class="modal"> 
        <!-- Модальное окно с контактной информацией --> 
        <div class="modal-content"> 
            <span class="close" onclick="closeContactInfo()">&times;</span> 
            <h2>Контакты</h2> 
            <p>Телефон: +7 (XXX) XXX-XX-XX</p> 
            <p>Адрес: г. Ростов-на-Дону, ул. Улица, д. 42</p> 
            <p>Email: info@gmail.com</p> 
            <p>График работы: Пн-Пт: 9:00-18:00, Сб-Вс: выходной</p>
            <a href="https://api.whatsapp.com/send?phone=89888951263">
                <img src="img/icons/whatsapp.png" alt="WhatsApp">
            </a> 
        </div> 
    </div> 
 
    <!-- Баннер -->
    <section class="banner"> 
        <img src="img/icons/banner.jpg" alt="Баннер">
        <div class="banner-overlay"> 
            <div class="banner-content">
                <div class="title">
                    <h3>Откройте мир вдохновляющих образов</h3> 
                    <h2>c Clothing & Style</h2>
                    <p>Безупречный вкус, качество и комфорт!</p> 
                    <a href="catalog.php" class="btn">Перейти в каталог</a> 
                </div>
            </div> 
        </div> 
    </section>
 
    <section id="new-products" class="new-products">
        <div class="title">
            <h1>Новинки недели</h1> 
        </div>
        <div class="products-container">
            <?php 
                $sql = "SELECT * FROM catalog ORDER BY id DESC LIMIT 3"; 
                $result = $conn->query($sql); 
                if ($result->num_rows > 0) { 
                    // Вывод списка товаров 
                    while($row = $result->fetch_assoc()) { 
                        echo "<div class='product' onclick='openProductModal(" . $row['id'] . ")'>"; 
                            echo "<img src='" . $row["image_path"] . "' alt='" . $row["product_code"] . "'>"; 
                            echo "<div class='product-info'>"; 
                                echo "<h2>" . $row["name"] . "</h2>";
                                echo "<p class='price'>" . $row["price"] . "₽</p>"; 
                            echo "</div>"; 
                        echo "</div>"; 
                    }
                } else { 
                    echo "Нет товаров в каталоге"; 
                } 
            ?>
        </div>
    </section>
        
    <!-- Модальное окно с информацией о товаре --> 
    <div id="product-modal" class="product-modal"> 
        <div id="product-modal-content" class="product-modal-content"> 
            <img id="product-image" src="" alt=""> 
            <h1 id="product-name"></h1> 
            <p id="product-description"></p> 
            <h3 id="product-availability"></h3> 
            <h2 id="product-price"></h2>
            <span class="close" onclick="closeProductModal()">&times;</span> 
        </div> 
    </div>

    <!-- Преимущества --> 
    <section class="advantages"> 
    <div class="title"> 
        <h1>Наши преимущества</h1> 
    </div> 
    <div class="advantages-container"> 
        <div class="adv"> 
            <p>Текст преимущества 1</p> 
        </div> 
        <div class="adv"> 
            <p>Текст преимущества 2</p> 
        </div> 
        <div class="adv"> 
            <p>Текст преимущества 3</p> 
        </div> 
        <div class="adv"> 
            <p>Текст преимущества 4</p> 
        </div> 
        <div class="adv"> 
            <p>Текст преимущества 5</p> 
        </div> 
        <div class="adv"> 
            <p>Текст преимущества 6</p> 
        </div>  
    </div> 
    </section>

    <section id="about-us" class="about-us">
    <div class="title"> 
        <h1>О нас</h1>
    </div> 
    <div class="container"> 
        <div class="about-us-info"> 
            <h2>"Clothing & Style" — это команда людей, страстно увлеченных миром моды и стиля.</h2> 
            <p>В нашем магазине мужской и женской одежды и аксессуаров мы стремимся создать уникальное пространство, где каждый клиент сможет найти не только стильные вещи, но и первоклассный сервис и внимательное отношение.</p> 
            <p>Мы верим, что одежда — это не просто способ защититься от холода или выглядеть привлекательно. 
                Это возможность выразить свою индивидуальность, подчеркнуть свой стиль и уверенно шагать по жизни. 
                Поэтому каждый предмет одежды, представленный в нашем магазине, тщательно отобран с учетом последних модных тенденций, качества материалов и удобства при ношении.</p>
            <p>Мы гордимся тем, что создаем модную одежду, которая приносит удовольствие своим обладателям и помогает им чувствовать себя уверенно и стильно в любой ситуации. 
                Наша цель — делать моду доступной для всех, поэтому мы стремимся предложить высокое качество товаров по доступным ценам. </p>
        </div> 
        <div class="about-us-contact"> 
            <div class="background-image"></div> 
            <div class="text">
                <h3>Остались вопросы?</h3> 
                <a href="https://api.whatsapp.com/send?phone=89888951263" class="contact-us-btn">Свяжитесь с нами!</a> 
            </div> 
        </div> 
    </div> 
    </section>
 
    <footer> 
        <!-- Подвал --> 
        <div class="contact"> 
            <h3>Контакты</h3> 
            <p>Адрес: г. Ростов-на-Дону, ул. Улица, д. 42</p> 
            <p>Телефон: +7 (XXX) XXX-XX-XX</p> 
            <p>Email: info@gmail.com</p> 
            <a href="https://api.whatsapp.com/send?phone=89888951263">
                <img src="img/icons/whatsapp.png" alt="WhatsApp">
            </a>  
        </div> 
    </footer> 

    <script src="js/script.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>

</body>
</html>