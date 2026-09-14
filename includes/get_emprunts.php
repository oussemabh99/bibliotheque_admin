<?php
  function getEmprunts () {
    require "connexion.php";
    $sql = "SELECT  livres.titre AS titre, lecteurs.nom AS lecteur, emprunts.date_emprunt, emprunts.returned AS returned 
            FROM emprunts, livres, lecteurs
            WHERE emprunts.livre_id = livres.id AND emprunts.lecteur_id = lecteurs.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);            
  }
  function addEmprunt($livre_id, $lecteur_id) {
    require "connexion.php";
    $stmt = $pdo->prepare("INSERT INTO emprunts (livre_id, lecteur_id, date_emprunt,returned) VALUES (?, ?, ?,False)");
    return $stmt->execute([$livre_id, $lecteur_id, date("Y-m-d H:i:s")]);
  }
  function getEmpruntStats() {
    require "connexion.php";
    $sql = "SELECT livres.titre AS titre, COUNT(*) AS count
            FROM emprunts
            JOIN livres ON emprunts.livre_id = livres.id
            GROUP BY livres.titre
            ORDER BY count DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  function returnBook($id) {
    require "connexion.php";
    $stmt = $pdo->prepare("UPDATE emprunts SET returned = True WHERE id = ?");
    return $stmt->execute([$id]);
  }
?>