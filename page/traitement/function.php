<?php 
    // function getNbProuduitVenduParDateParCateg($idcateg,$datedebut,$datefin){
    //     require('connexion.php'); 
    //     $sql = "SELECT count(*) as nb from facture 
    //             join detailfacture
    //             on facture.idfact = detailfacture.idfact
    //             join medicament 
    //             on detailfacture.idmec = medicament.id
    //             where medicament.idcat=".$idcateg." and (facture.datefact>='".$datedebut."' and facture.datefact<='".$datefin.")";
    //     $resultat = mysqli_query($bdd,$sql);
    //     $donne = mysqli_fetch_assoc($resultat) ;
    //     // echo $sql;
    //     return $donne['nb'];
    // }
    
    function select(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM medicament";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectclient(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM client";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function insertCat($nom){
        require('connexion.php');
        $sql = "INSERT INTO categorie VALUES(NULL,'%s')";
        $sql = sprintf($sql,$nom);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function insertsousCat($idcat,$nom){
        require('connexion.php');
        $sql = "INSERT INTO souscategorie VALUES(NULL,'%s','%s')";
        $sql = sprintf($sql,$idcat,$nom);
        $resultat = mysqli_query($bdd,$sql);
    }
    function getNomByid($idclient){
        require('connexion.php'); 
        $sql = "SELECT nom
                FROM Client where idclient = '".$idclient."' ";
        $resultat = mysqli_query($bdd,$sql);
        $donne = mysqli_fetch_assoc($resultat) ;
        // echo $sql;
        return $donne['nom'];
    }
    function getNomByidmed($idmed){
        require('connexion.php'); 
        $sql = "SELECT nom
                FROM Medicament where id = '".$idmed."' ";
        $resultat = mysqli_query($bdd,$sql);
        $donne = mysqli_fetch_assoc($resultat) ;
        // echo $sql;
        return $donne['nom'];
    }
    function getAllByidmed($idmed){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Medicament where id = '".$idmed."' ";
        $resultat = mysqli_query($bdd,$sql);
        $donne = mysqli_fetch_assoc($resultat) ;
        // echo $sql;
        return $donne;
    }
    function selectcatsouscatPagination($categorie,$souscat,$deb){
        require('connexion.php'); 
        // $idcat = getIdByNom($categorie);
        // echo $idcat;
        // $idsouscat = getIdByNom2($souscat);
        $sql = "SELECT *
                FROM Medicament 
                where idcat = '".$categorie."' and idsouscat = '".$souscat."' 
                limit ".$deb.",8";
        // echo $sql;
        $sqlall = "SELECT *
                FROM Medicament
                limit ".$deb.",8";
        if($souscat != 7){

            $resultat = mysqli_query($bdd,$sql);    
        }
        if($souscat == 7){

            $resultat = mysqli_query($bdd,$sqlall);    
        }  
        return $resultat;

    }
    function selectcatsouscatPaginationtrie($categorie,$souscat,$deb,$colonne){
        require('connexion.php'); 
        // $idcat = getIdByNom($categorie);
        // echo $idcat;
        // $idsouscat = getIdByNom2($souscat);
        $sql = "SELECT *
                FROM Medicament 
                where idcat = '".$categorie."' and idsouscat = '".$souscat."' 
                ORDER BY %s
                limit %s,8";
        $sql = sprintf($sql,$colonne,$deb);
        // echo $sql;

        $sqlall = "SELECT *
                FROM Medicament
                ORDER BY %s
                limit %s,8";
        $sqlall = sprintf($sqlall,$colonne,$deb);
        if($souscat != 7){

            $resultat = mysqli_query($bdd,$sql);    
        }
        if($souscat == 7){

            $resultat = mysqli_query($bdd,$sqlall);    
        }  
        return $resultat;

    }
    function getListFacturePagination($deb){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Facture
                limit ".$deb.",9 ";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function getListFacturePaginationTrie($deb,$colonne){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Facture
                ORDER BY %s
                limit %s,9 ";
        $sql = sprintf($sql,$colonne,$deb);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function insertRemise($montant,$remise){
        require('connexion.php');
        $sql = "INSERT INTO ConfigRemise VALUES(NULL,'%s','%s','%s','%s')";
        $sql = sprintf($sql,'2018-12-11','2018-12-12',($remise/100),$montant);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function payer($idclient,$reste){
        require('connexion.php');
        $sql_MP = "UPDATE Facture 
					 SET etat=12
                     WHERE idclient='%s' " ;
                     echo $sql_MP;
        $sql_MP_r = "UPDATE Facture 
                    SET etat=1
                    WHERE idclient='%s' " ;
                    echo $sql_MP;
        if($reste==0){

            $sql_MP_r = sprintf($sql_MP_r,$idclient) ;
            mysqli_query($bdd,$sql_MP_r) or die(mysqli_errno($bdd)." ".mysqli_error($bdd)) ;
        }
        if($reste!=0){

            $sql_MP = sprintf($sql_MP,$idclient) ;
            mysqli_query($bdd,$sql_MP) or die(mysqli_errno($bdd)." ".mysqli_error($bdd)) ;
        }
    }
    function supprimer($idclient){
        require('connexion.php');
        $sql_MP = "UPDATE Facture 
					 SET etat=3
                     WHERE idclient='%s' " ;
                     echo $sql_MP;
		  $sql_MP = sprintf($sql_MP,$idclient) ;
		  mysqli_query($bdd,$sql_MP) or die(mysqli_errno($bdd)." ".mysqli_error($bdd)) ;
    }
    function viser($idclient,$total,$reste){
        require('connexion.php');
        $sql_MP = "UPDATE Facture 
					 SET etat=13,total='%s',reste='%s'
                     WHERE idclient='%s' " ;
                    echo $sql_MP;
        $sql_MP = sprintf($sql_MP,$total,$reste,$idclient) ;
		  mysqli_query($bdd,$sql_MP) or die(mysqli_errno($bdd)." ".mysqli_error($bdd)) ;
    }
    function getRemise($montant){
        require('connexion.php'); 
        // $sqlDate = "SELECT CURRENT_DATE() as date" ; 
        // $result = mysqli_query($bdd,$sqlDate) ;
        // $dateAjout = mysqli_fetch_assoc($result) ;
        // $date =  $dateAjout['date'];
        // $sql = "SELECT valeur
        //         FROM ConfigRemise 
        //         WHERE datedeb<='".$date."' and datefin>='".$date."' ";
        // $sqlcond = "SELECT valeur
        //         FROM ConfigRemise 
        //         WHERE idconf=5 ";
        $sql2 = "SELECT montant
                FROM ConfigRemise";
        $result2 = mysqli_query($bdd,$sql2) ;
        while($val = mysqli_fetch_assoc($result2)){

            if($montant>=$val['montant']){
                $sqlcond = "SELECT valeur
                FROM ConfigRemise 
                WHERE montant=".$val['montant'];
                $resultat = mysqli_query($bdd,$sqlcond);
            }
        }
        $rep = mysqli_fetch_assoc($resultat) ;
        return $rep['valeur'];
    }
    function updatefacture($dejapaye,$reste,$idclient){
        require('connexion.php');
        $sql_MP = "UPDATE Facture 
					 SET dejapaye='%s', reste='%s'
                     WHERE idclient='%s' " ;
                     echo $sql_MP;
		  $sql_MP = sprintf($sql_MP,$dejapaye,$reste,$idclient) ;
		  mysqli_query($bdd,$sql_MP) or die(mysqli_errno($bdd)." ".mysqli_error($bdd)) ;
    }
    function selectdetailfacture(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM DetailFacture";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectfacture($idclient){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Facture 
                join DetailFacture 
                on Facture.idfact=DetailFacture.idfact
                WHERE facture.idclient=".$idclient;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectAllfacture(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Facture";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selecthistfacture($idclient){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM HistoriqueFactureClient
                WHERE idclient=".$idclient;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function insertdetailfacture($idmed,$quant,$prix,$mont,$remise){
        require('connexion.php');
        $idfact = generer_Code("Facture");
        $sql = "INSERT INTO DetailFacture VALUES(NULL,'%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$idfact,$idmed,$quant,$prix,$mont,$remise);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function insertfacture($idclient,$total,$etat,$idmeth,$dejapaye,$reste){
        require('connexion.php');
        // $idfact = generer_Code("Facture");
        $sqlDate = "SELECT CURRENT_DATE() as date" ; 
        $result = mysqli_query($bdd,$sqlDate) ;
        $dateAjout = mysqli_fetch_assoc($result) ;
        echo 'date'.$dateAjout;
        $sql = "INSERT INTO Facture VALUES(NULL,'%s','%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$dateAjout['date'],$idclient,$total,$etat,$idmeth,$dejapaye,$reste);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function inserthistfacture($idclient,$total,$dejapaye,$reste){
        require('connexion.php');
        // $idfact = generer_Code("Facture");
        $sqlDate = "SELECT CURRENT_DATE() as date" ; 
        $result = mysqli_query($bdd,$sqlDate) ;
        $dateAjout = mysqli_fetch_assoc($result) ;
        $sql = "INSERT INTO HistoriqueFactureClient VALUES(NULL,'%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$dateAjout['date'],$idclient,$total,$dejapaye,$reste);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function generer_Code($table)
	{
        require('connexion.php');

		$sql_code = "SELECT COUNT(*) as nbElement 
					 FROM %s" ;
		$sql_code = sprintf($sql_code,$table) ;
		$result_code = mysqli_query($bdd,$sql_code) ;
		$donnee = mysqli_fetch_assoc($result_code) ;
		$code = $donnee['nbElement'] + 1 ;
		// echo $code ;
		return $code ;
	}
    function inserer($reference,$nom,$categorie,$unite,$quantite,$descmedicament,$modeadministration,$femmeenceinte,$allaitement,$pourqui){
        require('connexion.php');

        $sql = "INSERT INTO Medicament VALUES(NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$reference,$nom,$categorie,$unite,$quantite,$descmedicament,$modeadministration,$femmeenceinte,$allaitement,$pourqui,$pourqui);
        echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function inscrire($nom,$email,$mdp){
        require('connexion.php');
        $sql = "INSERT INTO Client VALUES(NULL,'%s','%s','%s')";
        $sql = sprintf($sql,$nom,$email,$mdp);
        // echo $sql;
        $resultat = mysqli_query($bdd,$sql);
    }
    function login($email, $mdp){
        require('connexion.php');
        $sql = "SELECT COUNT(*) as count
                FROM Client where email='".$email."' and mdp='".$mdp."' ";
        echo $sql;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function findbyemail($email){
        require('connexion.php');
        $sql = "SELECT *
                FROM Client where email='".$email."' ";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectMedicRand(){
        $rand = mt_rand(1,24);
        require('connexion.php'); 
        $sql = "SELECT *
                FROM medicament limit ".$rand.",8";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectMedicPub(){
        $rand = mt_rand(1,24);
        require('connexion.php'); 
        $sql = "SELECT *
                FROM medicament limit ".$rand.",3";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function selectById($idmedic){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM medicament
                WHERE id=".$idmedic;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function typemedic(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM TypeMedicament";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function destine(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Destine";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function mode(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM ModeAdministration";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function cat(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM Categorie ";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function souscat(){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM SousCategorie";
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function souscatByIdcat($idcat){
        require('connexion.php'); 
        $sql = "SELECT *
                FROM SousCategorie where idcat = ".$idcat;
        $resultat = mysqli_query($bdd,$sql);
        return $resultat;
    }
    function souscatByIdcat2($idcat){
        $sql = "SELECT *
                FROM SousCategorie where idcat = ".$idcat;
        return executeQuery($sql);
    }
    function executeQuery($sql) {
		$bdd =mysqli_connect('localhost','root','root','pharmacie'); 
		$valiny= mysqli_query($bdd, $sql )  or die($bdd->error);;	
		$result = array();
		while ($row = $valiny->fetch_assoc())  {
			$result[] = $row;
		}
		mysqli_free_result($valiny);
		return $result;
	}
    function getIdByNom($nom){
        require('connexion.php'); 
        $sql = "SELECT id
                FROM Categorie where nom = '".$nom."' ";
        $resultat = mysqli_query($bdd,$sql);
        // echo $sql;
        return $resultat;
    }
    function getIdByNom2($nom){
        require('connexion.php'); 
        $sql = "SELECT id
                FROM SousCategorie where nom = '".$nom."' ";
        $resultat = mysqli_query($bdd,$sql);
        // echo $sql;
        return $resultat;
    }
    function recherche($designation,$categorie,$souscat,$prixmin,$prixmax){
        require('connexion.php'); 
        // $idcat = getIdByNom($categorie);
        // echo $idcat;
        // $idsouscat = getIdByNom2($souscat);
        $sql = "SELECT *
                FROM Medicament 
                where nom like '".$designation."' and idcat = '".$categorie."' and idsouscat = '".$souscat."'  and prix > '".$prixmin."' and prix <  ".$prixmax." ";
        // // echo $sql;
        $sql2 = "SELECT *
        FROM Medicament";
        $sql3 = "SELECT *
        FROM Medicament where nom like '".$designation."' ";
        if(($prixmax==0 && $prixmin==0) ){
            $resultat = mysqli_query($bdd,$sql3);
            
        }
        
        else{

            $resultat = mysqli_query($bdd,$sql);
        }
        return $resultat;

    }

    
    function rechercheInd($critere){
        require('connexion.php'); 
        $test = $critere;
        $sql = "SELECT *
                FROM Medicament 
                where colonneindex like '".$critere."' ";
        $sql2 = "SELECT *
                FROM Medicament 
                where colonneindex like '%".$critere."%' ";
        $sql3 = "SELECT * FROM Medicament";        
        if($critere!=''){
            $ind0=$test[0];
            $indf=$test[strlen($test)-1];
            if(($ind0=='%' && $indf=='%') || $indf=='%' || $ind0=='%'){
                $resultat = mysqli_query($bdd,$sql);
            }
            else{
                $resultat = mysqli_query($bdd,$sql2);    
            }
        }
        else{
            $resultat = mysqli_query($bdd,$sql3);
        }
        return $resultat;
    }

?>