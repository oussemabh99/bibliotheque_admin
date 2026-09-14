<?php
$host="192.168.1.10";
$db="bibliotheque";
$user="dbadmin";
$pass="dbadmin";

try{

$pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

echo "Erreur : ".$e->getMessage();

}

?>
