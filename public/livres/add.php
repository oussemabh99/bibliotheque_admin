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
   if (!isset($_POST['titre']) )  {
        header("Location: add.php");
        exit();
    }
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    include '../../includes/get_auteurs.php';
    $auteur_id = getauteurByName($auteur);
    $annee = intval($_POST['annee']);
    $NbrBook = intval($_POST['nbrBook']);
    try {
        include '../../includes/get_livre.php';
        addLivre($titre, $auteur_id, $annee, $NbrBook);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }


}