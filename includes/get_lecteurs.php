<?php
function getLecteurs() {
    require "connexion.php";
    $sql = "SELECT * FROM lecteurs";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addLecteur($nom, $email) {
    require "connexion.php";
    $stmt = $pdo->prepare("INSERT INTO lecteurs (nom, email) VALUES (?, ?)");
    return $stmt->execute([$nom, $email]);
}
function getLecteurFromName($nom) {
    require "connexion.php";
    $stmt = $pdo->prepare("SELECT id FROM lecteurs WHERE nom = ?");
    $stmt->execute([$nom]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($result['id']);
}
?>