<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
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

    <div class="catalog">  
        <div class="title">
            <h1>Каталог</h1> 
        </div>
        <div class="catalog-container">
            <!-- Поиск по названию --> 
            <div class="search-bar">   
                <div class="search-container"> 
                    <input type="text" id="search-input" placeholder="Поиск по названию">   
                    <div class="category-filter"> 
                        <label for="category-select">Выберите категорию:</label>   
                        <select id="category-select">   
                            <option value="all">Все категории</option>   
                            <option value="female">Женская одежда</option>   
                            <option value="male">Мужская одежда</option>   
                            <option value="acc">Аксессуары</option>   
                        </select>   
                    </div>   
                    <div class="price-filter">   
                        <label for="price-from">Цена от:</label>   
                        <input type="number" id="price-from" min="0">   
                        <label for="price-to">до:</label>   
                        <input type="number" id="price-to" min="0" step="100">   
                    </div> 
                    <button id="price-search-btn">Поиск</button> 
                </div> 
            </div>
            <div class="category-container">
                <div class="category" id="female-category"> 
                    <h2>Женская одежда</h2> 
                    <div class="products" id="female-products"> 
                        <?php 
                            // Женская одежда
                            $sql_female = "SELECT * FROM catalog WHERE category = 'female'"; 
                            $result_female = $conn->query($sql_female); 
                            if ($result_female->num_rows > 0) { 
                                while($row = $result_female->fetch_assoc()) { 
                                    echo "<div class='product' onclick='openProductModal(" . $row['id'] . ")'>"; 
                                        echo "<img src='" . $row["image_path"] . "' alt='" . $row["product_code"] . "'>"; 
                                        echo "<div class='product-info'>"; 
                                            echo "<h2>" . $row["name"] . "</h2>"; 
                                            echo "<p class='price'>" . $row["price"] . "₽</p>"; 
                                        echo "</div>"; 
                                    echo "</div>"; 
                                } 
                            } else { 
                                echo "Нет товаров в категории 'Женская одежда'"; 
                            } 
                        ?> 
                    </div>
                </div> 
                <div class="category" id="male-category"> 
                    <h2>Мужская одежда</h2> 
                    <div class="products" id="male-products"> 
                        <?php 
                            // Мужская одежда
                            $sql_male = "SELECT * FROM catalog WHERE category = 'male'"; 
                            $result_male = $conn->query($sql_male); 
                            if ($result_male->num_rows > 0) { 
                                while($row = $result_male->fetch_assoc()) { 
                                    echo "<div class='product' onclick='openProductModal(" . $row['id'] . ")'>"; 
                                        echo "<img src='" . $row["image_path"] . "' alt='" . $row["product_code"] . "'>"; 
                                        echo "<div class='product-info'>"; 
                                            echo "<h2>" . $row["name"] . "</h2>"; 
                                            echo "<p class='price'>" . $row["price"] . "₽</p>"; 
                                        echo "</div>"; 
                                    echo "</div>"; 
                                } 
                            } else { 
                                echo "Нет товаров в категории 'Мужская одежда'"; 
                            } 
                        ?> 
                    </div> 
                </div> 
                <div class="category" id="acc-category"> 
                    <h2>Аксессуары</h2> 
                    <div class="products" id="acc-products"> 
                        <?php 
                            // Аксессуары
                            $sql_accessories = "SELECT * FROM catalog WHERE category = 'acc'"; 
                            $result_accessories = $conn->query($sql_accessories); 
                            if ($result_accessories->num_rows > 0) { 
                                while($row = $result_accessories->fetch_assoc()) { 
                                    echo "<div class='product' onclick='openProductModal(" . $row['id'] . ")'>"; 
                                        echo "<img src='" . $row["image_path"] . "' alt='" . $row["product_code"] . "'>"; 
                                        echo "<div class='product-info'>"; 
                                            echo "<h2>" . $row["name"] . "</h2>"; 
                                            echo "<p class='price'>" . $row["price"] . "₽</p>"; 
                                        echo "</div>"; 
                                    echo "</div>"; 
                                } 
                            } else { 
                                echo "Нет товаров в категории 'Аксессуары'"; 
                            } 
                        ?> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
      
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

