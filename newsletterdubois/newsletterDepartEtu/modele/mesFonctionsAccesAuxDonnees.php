<?php

function connexionBDD()
{
$bdd = 'mysql:host=localhost;dbname=BaseProjetImmo';
$user ='root';
$password = 'newpass';
try {
   
    $ObjConnexion=new PDO($bdd,$user,$password,array(
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 catch (PDOException $e)
 {
     echo $e->getMessage();
 }
return $ObjConnexion;
}

function deconnexionBDD($cnx)
{
    $cnx=null;
}


function ChercheBien($pdo,$type,$ville)
{
    $sql = " SELECT * FROM Biens INNER JOIN Types ON idType = idTypes WHERE ville = '$ville' AND libelle = '$type'";
    $test=$pdo->prepare($sql);
    $test->execute();
    $lesBiens=$test->fetchAll();
    return $lesBiens;
}

echo "youpi"

?>

