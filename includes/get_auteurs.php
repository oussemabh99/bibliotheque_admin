<?php
function getAuteurs() {
    require_once 'connexion.php';
    $sql = "SELECT * FROM auteurs";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getAuteur($id) {
    require_once 'connexion.php';
    $stmt = $pdo->prepare("SELECT * FROM auteurs WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function modifyAuteur($id, $nom, $nationalite) {
    require_once 'connexion.php';
    $stmt = $pdo->prepare("UPDATE auteurs SET nom = ?, nationalite = ? WHERE id = ?");
    return $stmt->execute([$nom, $nationalite, $id]);
}
function deleteAuteur($id) {
    require_once 'connexion.php';
    $stmt = $pdo->prepare("DELETE FROM auteurs WHERE id = ?");
    return $stmt->execute([$id]);
}
function addAuteur($nom, $nationalite) {
    require_once 'connexion.php';
    $stmt = $pdo->prepare("INSERT INTO auteurs (nom, nationalite) VALUES (?, ?)");
    return $stmt->execute([$nom, $nationalite]);
}
function getauteurByName($nom) {
    require_once 'connexion.php';
    $stmt = $pdo->prepare("SELECT id FROM auteurs WHERE nom = ?");
    $stmt->execute([$nom]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($result['id']);
}
function getAuteurNames() {
    require_once 'connexion.php';
    $stmt = $pdo->query("SELECT nom FROM auteurs");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
