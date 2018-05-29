<?php
include ("MyPDO.php");
//*****************************************************************************************
class DaoImmo extends MyPDO
{

	// constructeur qui appelle constructeur de la super classe qui effectue la connexion
	// avec les variables contenues dans login.php
    function __construct()
	{
	include ("login.php");
	parent::__construct('mysql:host='.$serveur.';dbname='.$mabase,$login, $motdepasse);
    } // fin constructeur
//---------------------------------------------------------------------
  function getAllOrderBy($ordre)
	{ 
	//echo "Ordre : ".$ordre."<br>";
	$strSQL = "SELECT idDemande, prenom, genre, ville, budget, superficie FROM demande d, personne p order by ".$ordre;
	$getAllOrderBy=$this->prepare($strSQL);
	$getAllOrderBy->execute();
	$t=$getAllOrderBy->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllByVille($ville)
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getAllByVille=$this->prepare("SELECT * FROM demande WHERE ville = ?");
	$getAllByVille->execute(array($ville));
	$t=$getAllByVille->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
    function getAllByBudget($budget)
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getAllByBudget=$this->prepare("SELECT * FROM demande WHERE budget < ?");
	$getAllByBudget->execute(array($budget));
	$t=$getAllByBudget->fetchAll(PDO::FETCH_OBJ);
	return $t;	
	}
//----------------------------------------------------------------------
    function getAllBySuperficie($superficie)
        {
        $getAllBySuperficie=$this->prepare("SELECT * FROM demande WHERE superficie = ?");
        $getAllBySuperficie->execute(array($superficie));
        $t=$getAllBySuperficie->fetchAll(PDO::FETCH_OBJ);
        return $t;
    }
//---------------------------------------------------------------------
	function getAllById($id)
	{
	$getAllById=$this->prepare("SELECT * FROM demande d, personne p WHERE d.idPersonne=p.idPersonne AND idDemande = ?");
	$getAllById->execute(array($id));
	$t=$getAllById->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
	
	
//---------------------------------------------------------------------	
    function getAllByGenre($genre)
    {
    $getAllByGenre=$this->prepare("SELECT * FROM demande WHERE genre = ?");
    $getAllByGenre->execute(array($genre));
    $t=$getAllByGenre->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//---------------------------------------------------------------------
    function getAllByBudgetGenre($budget,$genre)
    {
    $getAllByBudgetGenre=$this->prepare("SELECT * FROM demande WHERE budget < ? AND genre = ?");
    $getAllByBudgetGenre->execute(array($budget,$genre));
    $t=$getAllByBudgetGenre->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//----------------------------------------------------------------------
    function getAllByBudgetMaxi()
    {
    $getAllByBudgetMaxi=$this->prepare("SELECT MAX(budget) FROM demande");
    $getAllByBudgetMaxi->execute(array());
    $t=$getAllByBudgetMaxi->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//----------------------------------------------------------------------
    function getAllByBudgetMini()
    {
    $getAllByBudgetMini=$this->prepare("SELECT MIN(budget) FROM demande");
    $getAllByBudgetMini->execute(array());
    $t=$getAllByBudgetMini->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//----------------------------------------------------------------------
    function getAllByBudgetMoyen()
    {
    $getAllByBudgetMoyen=$this->prepare("SELECT AVG(budget) FROM demande");
    $getAllByBudgetMoyen->execute(array());
    $t=$getAllByBudgetMoyen->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//----------------------------------------------------------------------
    function getAllByBudgetSupMoyen()
    {
    $getAllByBudgetSupMoyen=$this->prepare("SELECT budget FROM demande WHERE budget > (SELECT AVG(budget) FROM demande)");
    $getAllByBudgetSupMoyen->execute(array());
    $t=$getAllByBudgetSupMoyen->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//--------------------------------------------------------------------- 
    function Modif($personne,$ville,$budget,$genre,$ide)
    {
    $Modif=$this->prepare("UPDATE demande d, personne p SET p.prenom= ? ,d.ville= ?, d.budget=?, d.genre=? WHERE p.idPersonne=d.idPersonne AND d.idDemande=?");
    $Modif->execute(array($personne,$ville,$budget,$genre,$ide));
    // requete adminer testé reussie
    // UPDATE demande d, personne p SET p.prenom='lolo' ,d.ville='saint-leu' , d.budget='255000', d.genre='villa' ,d.superficie='120' WHERE p.idPersonne=d.idPersonne AND d.idDemande='9';
    }
//---------------------------------------------------------------------
    function Insere($personne,$ville,$budget,$genre,$superficie)
        {
            $res=$this->query("SELECT * from personne WHERE prenom='$personne'")->fetchAll(PDO::FETCH_ASSOC);
            if(isset($res[0])){
                $idvar=$res[0]['idPersonne']; //la variable pour l'id personne
                $demandeMax=$this->query("SELECT MAX(idDemande) from demande")->fetchAll(PDO::FETCH_NUM)[0][0]+1; //recupere l'id max de demande
                $this->query("INSERT INTO demande (idDemande, idPersonne, genre, ville, budget, superficie, categorie) VALUES($demandeMax, $idvar,'$genre','$ville','$budget','$superficie','vente')");               
            }
            else{
                $personneMax=$this->query("SELECT MAX(idPersonne) FROM personne")->fetchAll(PDO::FETCH_NUM)[0][0]+1;
                $Insert1=$this->query("INSERT INTO personne (idPersonne, prenom) VALUES ('$personneMax','$personne')");
                $demandeMax=$this->query("SELECT MAX(idDemande) from demande")->fetchAll(PDO::FETCH_NUM)[0][0]+1;
                $this->query("INSERT INTO demande (idDemande, idPersonne, genre, ville, budget, superficie, categorie) VALUES($demandeMax, $personneMax,'$genre','$ville', '$budget','$superficie', 'vente')"); 
                }
        }
//----------------------------------------------------------------------
    function getAllByNbBiens()
    {
    $getAllByNbBiens=$this->prepare("SELECT COUNT(idDemande) FROM demande");
    $getAllByNbBiens->execute(array());
    $t=$getAllByNbBiens->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//----------------------------------------------------------------------
    function getAllBySuperficie($superficie)
    {
    $getAllBySuperficie=$this->prepare("SELECT * FROM demande WHERE superficie = ?");
    $getAllBySuperficie->execute(array($superficie));
    $t=$getAllBySuperficie->fetchAll(PDO::FETCH_OBJ);
    return $t;
    }
//---------------------------------------------------------------------	
	function getAllById($id)
	{
	$getAllById=$this->prepare("SELECT * FROM demande d, personne p WHERE d.idPersonne = p.idPersonne AND idDemande=?");
	$getAllById->execute(array($id));
	$t=$getAllById->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}	
//---------------------------------------------------------------------
	function getVilleByVilleStartWith($ville)
	{
	$getVilleByVilleStartWith=$this->prepare("SELECT distinct ville FROM demande WHERE ville like ? ");
	$ville=$ville.'%';
	$retour=array();
	$getVilleByVilleStartWith->setFetchMode(PDO::FETCH_NUM);
	$getVilleByVilleStartWith->execute(array($ville));
	for ($i=0;$i<$getVilleByVilleStartWith->rowCount();$i++)
		{
		$retour=array_merge($retour,$getVilleByVilleStartWith->fetch());
		}
	return $retour;
	}
//---------------------------------------------------------------------
	
};// fin de classe
