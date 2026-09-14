<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        include '../../includes/get_auteurs.php';
    $auteurs = getAuteurs();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

}
include './views/list.php';
?>