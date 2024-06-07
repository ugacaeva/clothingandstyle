<?php 
// Подключение к базе данных 
require_once 'connect.php'; 
$dbname = "clothingandstyle_db"; // Название вашей базы данных 
if (!$conn->select_db($dbname)) { 
    die("Ошибка выбора базы данных: " . $conn->error); 
}
 
// Получение идентификатора товара из POST-запроса 
$productId = $_POST['productId']; 
 
// Запрос к базе данных для получения информации о товаре 
$query = "SELECT * FROM catalog WHERE id = '$productId'"; 
$result = $conn->query($query); 
 
if ($result) { 
    // Если запрос выполнен успешно, формирование массива с информацией о товаре 
    $productInfo = $result->fetch_assoc(); 

    $availability = (int)$productInfo['availability']; 
    $productInfo['availability'] = $availability;
 
    // Преобразование массива в формат JSON 
    echo json_encode($productInfo); 
} else { 
    // Если произошла ошибка при выполнении запроса, отправляем сообщение об ошибке 
    echo json_encode(array('error' => 'Ошибка при выполнении запроса к базе данных.')); 
} 
 
// Закрытие соединения с базой данных 
$conn->close(); 
?>
