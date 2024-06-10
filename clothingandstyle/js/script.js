console.log("Script loaded");

// Функция для отображения модального окна с контактной информацией
function showContactInfo() {
    var modal = document.getElementById("contact-modal");    
    modal.style.display = "block";
}

// Функция для закрытия модального окна с контактной информацией
function closeContactInfo() {
    var modal = document.getElementById("contact-modal");    
    modal.style.display = "none";
}

// Функция для перехода на главную страницу при клике на логотип
function goToHome() {
    window.location.href = "index.php";
}

// Мобильное меню
function toggleMenu() { 
    var nav = document.getElementById('mobile-nav'); 
    if (nav.style.display === 'flex') { 
        nav.style.display = 'none'; 
    } else { 
        nav.style.display = 'flex'; 
    } 
} 

// Функция для открытия модального окна карточки товара 
function openProductModal(productId) { 
    $.ajax({ 
        url: 'get_product_info.php', 
        method: 'POST', 
        data: { productId: productId }, 
        success: function(response) { 
            var productInfo = JSON.parse(response); 
            var modalContent = document.getElementById('product-modal-content'); 
            modalContent.innerHTML = ` 
                <span class="close" onclick="closeProductModal()">&times;</span> 
                <img src="${productInfo.image_path}" alt="${productInfo.name}"> 
                <h1>${productInfo.name}</h1> 
                <p>${productInfo.description}</p> 
                <h3>${productInfo.availability ? 'Есть в наличии' : 'Нет в наличии'}</h3>
                <h2> ${productInfo.price}₽</h2>  
            `; 
            $('#product-modal').css('display', 'block'); 
        }, 
        error: function(xhr, status, error) {  
            console.error(error); 
        } 
    }); 
}

// Функция для закрытия модального окна карточки товара 
function closeProductModal() { 
    const modal = document.getElementById("product-modal"); 
    modal.style.display = "none"; 
} 
 
window.onclick = function(event) { 
    const modal = document.getElementById("product-modal"); 
    if (event.target === modal) { 
        closeProductModal(); 
    } 
};

// Поиск и сортировка
document.addEventListener("DOMContentLoaded", function() { 
    const priceSearchBtn = document.getElementById("price-search-btn"); 
 
    priceSearchBtn.addEventListener("click", function() { 
        const searchInput = document.getElementById("search-input"); 
        const categorySelect = document.getElementById("category-select"); 
        const priceFromInput = document.getElementById("price-from"); 
        const priceToInput = document.getElementById("price-to"); 
        const femaleCategory = document.getElementById("female-category"); 
        const maleCategory = document.getElementById("male-category"); 
        const accCategory = document.getElementById("acc-category"); 
 
        const query = searchInput.value.toLowerCase().trim(); 
        const category = categorySelect.value; 
        const fromPrice = parseFloat(priceFromInput.value) || 0; 
        const toPrice = parseFloat(priceToInput.value) || Infinity; 
 
        const filterProduct = (product) => { 
            const productName = product.querySelector("h2").textContent.toLowerCase(); 
            const productPrice = parseFloat(product.querySelector(".price").textContent); 
            const productCategory = product.parentNode.id.split("-")[0]; 
             
            const matchesSearch = productName.includes(query); 
            const matchesCategory = category === "all" || productCategory === category; 
            const matchesPrice = productPrice >= fromPrice && productPrice <= toPrice; 
 
            return matchesSearch && matchesCategory && matchesPrice; 
        }; 
 
        [femaleCategory, maleCategory, accCategory].forEach((category) => { 
            Array.from(category.querySelectorAll(".product")).forEach((product) => { 
                filterProduct(product) ? product.style.display = "block" : product.style.display = "none"; 
            }); 
        }); 
    }); 
});


const filterCategory = (category) => {   
    const products = Array.from(category.querySelectorAll(".product"));   
    const visibleProducts = products.filter(filterProduct);   
    const hasVisibleProducts = visibleProducts.length > 0;   
    category.style.display = hasVisibleProducts ? "block" : "none";   
};   

filterCategory(femaleCategory);   
filterCategory(maleCategory);   
filterCategory(accCategory); 
