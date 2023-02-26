<?php

// Connexion à la base de données MySQL
$serveur = "localhost";
$utilisateur = "utilisateur";
$motdepasse = "motdepasse";
$basededonnees = "ma_base_de_donnees";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion à la base de données
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupération des paramètres depuis la page HTML
$parametre1 = $_POST['parametre1'];
$parametre2 = $_POST['parametre2'];

// Préparation de la requête SQL avec des paramètres de substitution
$sql = "SELECT * FROM ma_table WHERE colonne1 = ? AND colonne2 = ?";

// Création de la requête préparée avec les paramètres de substitution
$requete = mysqli_prepare($connexion, $sql);

// Vérification de la préparation de la requête
if (!$requete) {
    die("La préparation de la requête a échoué : " . mysqli_error($connexion));
}

// Liaison des paramètres à la requête préparée
mysqli_stmt_bind_param($requete, "ss", $parametre1, $parametre2);

// Exécution de la requête préparée
mysqli_stmt_execute($requete);

// Récupération des résultats de la requête
$resultat = mysqli_stmt_get_result($requete);

// Affichage des résultats
while ($ligne = mysqli_fetch_assoc($resultat)) {
    echo $ligne['colonne1'] . " - " . $ligne['colonne2'] . "<br>";
}

// Fermeture de la connexion à la base de données MySQL
mysqli_close($connexion);

?>