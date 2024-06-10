<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    
    $conn = new mysqli($servername, $username, $password); 
    
    if ($conn == false){
        print("Ошибка" . mysqli_connect_error());
    }
?>