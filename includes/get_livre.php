<?php
 function getLivres() {
    require 'connexion.php';
    $stmt = $pdo->query("SELECT livres.id, livres.titre, livres.annee,livres.NbrBook, auteurs.nom AS auteur FROM livres, auteurs WHERE livres.auteur_id = auteurs.id");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function getLivresAll() {
    require 'connexion.php';    
    $stmt = $pdo->query("SELECT * FROM livres");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
    function deleteLivre($id) {
    require 'connexion.php';
    $stmt = $pdo->prepare("DELETE FROM livres WHERE id = ?");
    return $stmt->execute([$id]);
 }
    function getLivre($id) {
    require 'connexion.php';   
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function addLivre($titre,$auteur_id,$annee,$NbrBook) {
    require 'connexion.php';
    $stmt = $pdo->prepare("INSERT INTO livres(titre,auteur_id,annee,NbrBook) VALUES (?, ?, ?,?)");
    $result = $stmt->execute([$titre, $auteur_id, $annee, $NbrBook]);
    return $result;

    }
    function searchLivresByAuthor($author) {
    require 'connexion.php';
    $stmt = $pdo->prepare("SELECT livres.id, livres.titre, livres.annee,livres.NbrBook,auteurs.nom FROM livres, auteurs WHERE livres.auteur_id = auteurs.id AND auteurs.nom = ?");
    $stmt->execute([$author]);  
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
    function searchLivresByTitle($title){
    require 'connexion.php';
    $stmt = $pdo->prepare("SELECT livres.id, livres.titre, livres.annee,livres.NbrBook, auteurs.nom AS auteur FROM livres, auteurs WHERE livres.auteur_id = auteurs.id AND livres.titre = ?");
    $stmt->execute([$title]);   
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
    function searchLivres($title, $author) {
    require 'connexion.php';
    $stmt = $pdo->prepare("SELECT livres.id, livres.titre, livres.annee,livres.NbrBook, auteurs.nom AS auteur FROM livres, auteurs WHERE livres.auteur_id = auteurs.id AND livres.titre = ? AND auteurs.nom = ?");
    $stmt->execute([$title, $author]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
    function getLivreFromTitle($title) {
    require 'connexion.php';
    $stmt = $pdo->prepare("SELECT id AS id FROM livres WHERE titre = ?");
    $stmt->execute([$title]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($result['id']);
    }
    function getLivreNumber($id) {
      require 'connexion.php';
      $stmt = $pdo->prepare("SELECT NbrBook FROM livres WHERE id = ?");
      $stmt->execute([$id]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC); 
      return ($result['NbrBook']);
      }
   function getLivreWithNbrNotZero() {
    require 'connexion.php';
      $stmt = $pdo->query("SELECT id, titre FROM livres WHERE NbrBook > 0");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
    function updateLivreNbrBook($id) {
    $nbr_actuelle = getLivreNumber($id);
    require 'connexion.php';
      $stmt = $pdo->prepare("UPDATE livres SET NbrBook = $nbr_actuelle-1  WHERE id = ?");
      return $stmt->execute([$id]);
    }
?>