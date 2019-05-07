

<?php 
            require('function.php');
            $reference = $_POST['reference'];
            $nom = $_POST['nom'];
            $categorie = $_POST['categorie'];
            $unite = $_POST['unite'];
            $quantite = $_POST['quantite'];
            $descmedicament = $_POST['descmedicament'];
            $modeadministration = $_POST['modeadministration'];
            $femmeenceinte = $_POST['femmeenceinte'];
            $allaitement = $_POST['allaitement'];
            $pourqui = $_POST['pourqui'];
            inserer($reference,$nom,$categorie,$unite,$quantite,$descmedicament,$modeadministration,$femmeenceinte,$allaitement,$pourqui);
            header('Location: ../medicament.php?test=reussie');
		?>
    