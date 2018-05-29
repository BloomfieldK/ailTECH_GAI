<?php
include("daoImmo.php");

//---------------------------------------------------------------------
class Model{

private	$monDao;

//---------------------------------------------------------------------
function __construct()
	{
	$this->monDao=new DaoImmo();
	}
//---------------------------------------------------------------------
function getAllOrderBy($ordre)
	{
	return $this->monDao->getAllOrderBy($ordre);
	}
//---------------------------------------------------------------------
function getAllByVille($ville)
	{
	return $this->monDao->getAllByVille($ville);
	}
//---------------------------------------------------------------------
function getAllByBudget($budget)
    {
    return $this->monDao->getAllByBudget($budget);
    }
//---------------------------------------------------------------------
function getAllByGenre($genre)
    {
    return $this->monDao->getAllByGenre($genre);
    }
//--------------------------------------------------------------------- 
function getAllByBudgetGenre($budget,$genre)
    {
    return $this->monDao->getAllByBudgetGenre($budget,$genre);
    }
//---------------------------------------------------------------------
function getAllByBudgetMaxi()
    {
    return $this->monDao->getAllByBudgetMaxi();
    }
//---------------------------------------------------------------------
function getAllByBudgetMini()
    {
    return $this->monDao->getAllByBudgetMini();
    }
//---------------------------------------------------------------------
function getAllByBudgetMoyen()
    {
    return $this->monDao->getAllByBudgetMoyen();
    }
//---------------------------------------------------------------------
function getAllByBudgetSupMoyen()
    {
    return $this->monDao->getAllByBudgetSupMoyen();
    }
//---------------------------------------------------------------------
function Modif($personne,$ville,$budget,$genre,$ide)
    {
    return $this->monDao->Modif($personne,$ville,$budget,$genre,$ide);
    }
//---------------------------------------------------------------------
function getAllByNbBiens()
    {
    return $this->monDao->getAllByNbBiens();	
    }
//---------------------------------------------------------------------
function getAllBySuperficie($superficie)
    {
    return $this->monDao->getAllBySuperficie($superficie);	
    }
//---------------------------------------------------------------------    	
function getAllByPersonne($idPersonne)
    {
	return $this->monDao->getAllByPersonne($idPersonne);
    }
//---------------------------------------------------------------------    
function getAllById($id)
	{
	return $this->monDao->getAllById($id);
	}
//---------------------------------------------------------------------
function getVilleByVilleStartWith($ville)
	{
	$t=$this->monDao->getVilleByVilleStartWith($ville);
	return $t;
	}
//---------------------------------------------------------------------
function Insere($personne,$ville,$budget,$genre,$superficie)
    {
    return $this->monDao->Insere($personne,$ville,$budget,$genre,$superficie);
    }

};// fin de classe

?>
