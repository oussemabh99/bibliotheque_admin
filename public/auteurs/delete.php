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
        include './views/delete.php';
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        header("Location: list.php");
        exit();
    }
    $id = $_POST['id'];
    try {
        include '../../includes/get_auteurs.php';
        deleteAuteur($id);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>