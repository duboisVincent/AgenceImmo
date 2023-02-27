<?php

include_once '../modele/mesFonctionsAccesAuxDonnees.php';


////////////////////////////
//Potentielment à enlever //
////////////////////////////
include_once './request.html';


//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();

$paramUN=$_POST['selectVille'];
        
$paramDEUX=$_POST['selectType'];

ChercheBien($lePdo,$paramUN,$paramDEUX);

echo $paramDEUX;

echo $paramUN;
//var_dump permet d'afficher le contenu d'un objet. Utilisable uniquement lors de test de validation
var_dump($lePdo);

?>
