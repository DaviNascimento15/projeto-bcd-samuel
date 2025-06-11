<?php
  


    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "aula2";

 
    $conn = new mysqli($servername, $username, $password, $dbName);


    if (!$conn){
        die("Falha ao conectar ao banco de dados: ". mysqli_error($conn));
    }
?>