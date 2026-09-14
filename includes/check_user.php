<?php
function checkUser($email, $password) {
    
require "connexion.php";

$sql="SELECT * FROM administrateurs WHERE email=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([$email]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);
$hash = password_hash($password, PASSWORD_DEFAULT);
if($user && password_verify($password,$user['password'])){
 return $user['email'];
}else{
return false;
}
}


