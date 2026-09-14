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
   if (!isset($_POST['nom']) || !isset($_POST['titre']) ) {
        header("Location: add.php");
        exit();
    }
    $nom = $_POST['nom'];
    $titre = $_POST['titre'];
    try {
        include '../../includes/get_emprunts.php';
        include '../../includes/get_lecteurs.php';
        include '../../includes/get_livre.php';
        $lecteur_id = getLecteurFromName($nom);
        $livre_id = getLivreFromTitle($titre);
        addEmprunt($livre_id, $lecteur_id);
        updateLivreNbrBook($livre_id);
        header("Location: list.php");
        exit();
    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}