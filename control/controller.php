<?php
//print_r($_REQUEST);

include("../model/model.php");
include("../view/view.php");

$maquette= new Model();
$maVue= new Vue();
$cas=0;

if (empty($_REQUEST["cas"]))  $cas="accueil";
if (isset($_REQUEST["cas"]))  $cas=$_REQUEST["cas"];     

if (isset($_REQUEST["budget"]))     $budget     =$_REQUEST["budget"];
if (isset($_REQUEST["genre"]))      $genre      =$_REQUEST["genre"];
if (isset($_REQUEST["ide"]))        $ide        =$_REQUEST["ide"];
if (isset($_REQUEST["choix"]))      $choix      =$_REQUEST["choix"];
if (isset($_REQUEST["ville"]))      $ville      =$_REQUEST["ville"];
if (isset($_REQUEST["personne"]))   $personne   =$_REQUEST["personne"];
if (isset($_REQUEST["superficie"])) $superficie =$_REQUEST["superficie"];

// quel lien nous interroge?
switch($cas)
 {
  case "accueil":
    $maVue->afficheAccueil(); 
    break;
  case "RechercheDemande":
    $maVue->afficheRechercheDem();
    break;
  case "budget":
    $t=$maquette->getAllOrderBy("budget");
    $maVue->afficheTab($t,100); 
    break;
  case "personne":
    $t=$maquette->getAllOrderBy("idPersonne");
    $maVue->afficheTab($t,100); 
    break;
  case "ville":
    $t=$maquette->getAllOrderBy("ville");
    $maVue->afficheTab($t,100); 
    break;
  case "genre":
    $t=$maquette->getAllOrderBy("genre");
    $maVue->afficheTab($t,100); 
    break;
  case "superficie":
    $t=$maquette->getAllOrderBy("superficie");
    $maVue->afficheTab($t,100); 
    break;
  case "villePrecise":
    if (!empty($ville))
    {
    $t=$maquette->getAllByVille($ville);
    $maVue->afficheTab($t,100); 
    }
    break;  
  case "budgetInferieur":
    if (!empty($budget))
    {
    $t=$maquette->getAllByBudget($budget);
    $maVue->afficheTab($t,100); 
    }
    break;  
  case "budgetGenre":
    if (!empty($budget) && !empty($genre))
    {
    $t=$maquette->getAllByBudgetGenre($budget,$genre);
    $maVue->afficheTab($t,100);
    }
    break;
  case "maxi":
      $t=$maquette->getAllByBudgetMaxi();
      $maVue->afficheTab($t,100);
      break;
  case "mini":
      $t=$maquette->getAllByBudgetMini();
      $maVue->afficheTab($t,100);
      break;
  case "budmoy":
      $t=$maquette->getAllByBudgetMoyen();
      $maVue->afficheTab($t,100);
      break;
  case "budsupmoy":
      $t=$maquette->getAllByBudgetSupMoyen();
      $maVue->afficheTab($t,100);
      break;
  case "nbbiens":
      $t=$maquette->getAllByNbBiens();
      $maVue->afficheTab($t,100);
    break;
   case "modifier":
     if (!empty($ide))
     {
	
      if ($choix=="supprimer")
       {
       //$tab=$maquette->getAllById($ide);
       //???????????????????
       //
       }
      if ($choix=="modifier")
       {
        $tab=$maquette->getAllById($ide);
        $maVue->formulaireModif($tab[0]);
      }
     }
    break;
  case "insere":
      $maVue->formulaireNouveau();
    break;
  case "VoiciLesModif":
     if (!(empty($personne)||empty($ville)||empty($budget)||empty($genre)))
     {
     $tab=$maquette->Modif($personne,$ville,$budget,$genre,$ide);
     $maVue->formulaireModif($tab[0]);
  //$requete="UPDATE demande SET nom='$personne',ville='$ville',budget='$budget',genre='$genre' ,superficie='$superficie'   WHERE id=$ide";
	//???????????????????
    }
	else {
      $maVue->afficheMess('Paramètre manquant');
      }
	break;	
  case "nouveau":
   
    if (!(empty($personne)||empty($ville)||empty($budget)||empty($genre)))
    {
      $tab=$maquette->Insere($personne,$ville,$budget,$genre,$superficie);
      $maVue->afficheMess('Insertion reussie');
      // $requete="INSERT INTO demande (personne,ville,budget,genre,superficie) 
      // VALUES('$personne','$ville','$budget','$genre','$superficie')";
      //??????         
        
    } 
    else 
    {
      $maVue->afficheMess('Paramètre manquant');
    }
    break;

   default:
    $t=$maquette->getAllOrderBy("idDemande");
    $maVue->afficheTab($t,100); 
 }



//----------------------------------------------

?> 
    
    

 
