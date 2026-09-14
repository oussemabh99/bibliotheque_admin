<?php
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    $title  = isset($_GET['title'])  ? trim($_GET['title'])  : null;
    $author = isset($_GET['author']) ? trim($_GET['author']) : null;

    try {
        include '../includes/get_livre.php';

        if ($title && $author) {
           
            $livres = searchLivres($title, $author);
        } elseif ($title) {
            
            $livres = searchLivresByTitle($title);
        } elseif ($author) {
            
            $livres = searchLivresByAuthor($author);
        } else {
            
            include '../includes/get_auteurs.php';
            include './livres/views/searchstruct.php';
            
            exit(); 
        }

        
        include './livres/views/recherche.php';

    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}