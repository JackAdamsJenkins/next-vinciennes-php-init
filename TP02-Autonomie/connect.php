<?php 
// Connexion à la base de données
$server = "localhost";
$username = "usernext";
$password = "123456";
$dbname = "nextformation";

// Connexion à la base de données
// $bdd = mysqli_connect("serveur", "nom d'utilisateur", "mot de passe", "nom de la base de données"); 
$bdd = mysqli_connect($server, $username, $password, $dbname);

// Tester si la connexion est effective
if(!$bdd)
    die("Vous n'êtes pas connecté");

?>