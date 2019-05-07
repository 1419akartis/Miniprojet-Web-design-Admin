<?php 
      require('function.php');
      $nom = $_POST['nom'];
      insertCat($nom);
      header('Location: ../categorie.php?test=reussie');
?>