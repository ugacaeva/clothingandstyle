<?php 
require_once 'connect.php'; 
$dbname = "clothingandstyle_db";  
if (!$conn->select_db($dbname)) { 
    die("Ошибка выбора базы данных: " . $conn->error); 
}
 
$productId = $_POST['productId']; 
  
$query = "SELECT * FROM catalog WHERE id = '$productId'"; 
$result = $conn->query($query); 
 
if ($result) { 
    $productInfo = $result->fetch_assoc(); 

    $availability = (int)$productInfo['availability']; 
    $productInfo['availability'] = $availability;
 
    echo json_encode($productInfo); 
} else { 
    echo json_encode(array('error' => 'Ошибка при выполнении запроса к базе данных.')); 
} 
 
$conn->close(); 
?>
