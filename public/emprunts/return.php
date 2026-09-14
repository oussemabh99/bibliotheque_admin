<?php
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id']) || !isset($_POST['book_id'])) {
        header("Location: list.php");
        exit();
    }
    $id = $_POST['id'];
    $book_id = $_POST['book_id'];
    try {
        include '../../includes/get_emprunts.php';
        include '../../includes/get_livre.php';
        returnBook($id);
        updateLivreNbrBookReturn($book_id);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}