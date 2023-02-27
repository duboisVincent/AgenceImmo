<?php

// Récupération des paramètres depuis la page HTML
$parametre1 = $_POST['parametre1'];
$parametre2 = $_POST['parametre2'];

// Connexion à PHPMyAdmin
$serveur = "localhost/phpmyadmin";
$utilisateur = "root";
$motdepasse = "newpass"; // si tests fait sur les ordis du labo sinon aucun mdp
$basededonnees = "BaseProjetImmo";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Préparation de la requête SQL avec des paramètres de substitution
$sql = "SELECT * FROM Biens INNER JOIN Types on idType = idTypes WHERE ville = $parametre1 AND  libelle =  $parametre2";

// Création de la requête préparée avec les paramètres de substitution
$requete = $connexion->prepare($sql);

// Vérification de la préparation de la requête
if (!$requete) {
    die("La préparation de la requête a échoué : " . $connexion->error);
}

// Liaison des paramètres à la requête préparée
$requete->bind_param("ss", $parametre1, $parametre2);

// Exécution de la requête préparée
$requete->execute();

// Récupération des résultats de la requête
$resultat = $requete->get_result();

// Affichage des résultats
while ($ligne = $resultat->fetch_assoc()) {
    echo $ligne['colonne1'] . " - " . $ligne['colonne2'] . "<br>";
}

// Fermeture de la connexion à PHPMyAdmin
$connexion->close();

?>