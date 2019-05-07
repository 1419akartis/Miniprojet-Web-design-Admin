<?php 
      require('function.php');
      $idcat = $_POST['categorie'];
      $nom = $_POST['nom'];
      insertsousCat($idcat,$nom);
      header('Location: ../souscategorie.php?test=reussie');
?>