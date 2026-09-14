<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
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
    if (!isset($_POST['nom']) || !isset($_POST['email'])) {
        header("Location: add.php");
        exit();
    }
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    try {
        include '../../includes/get_lecteurs.php';
        addLecteur($nom, $email);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}