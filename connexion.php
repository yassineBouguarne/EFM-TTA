<?php
$dsn = "mysql:host=localhost;dbname=gestionstagiaire_v1";
$username = "root";
$password = '';

try{
    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Not Good!!" . $e->getMessage();
}
