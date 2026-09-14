<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        
        include './views/add.php';
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['nom']) || !isset($_POST['nationalite'])) {
        header("Location: add.php");
        exit();
    }
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    try {
        include '../../includes/get_auteurs.php';
        addAuteur($nom, $nationalite);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>