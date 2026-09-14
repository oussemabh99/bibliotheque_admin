<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: list.php");
        exit();
    }
    $id = $_GET['id'];
    try {
        include '../../includes/get_auteurs.php';
        $auteur = getAuteur($id);
        include './views/modify.php';
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id']) || !isset($_POST['nom']) || !isset($_POST['nationalite'])) {
        header("Location: list.php");
        exit();
    }
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    try {
        include '../../includes/get_auteurs.php';
        modifyAuteur($id, $nom, $nationalite);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

?>
