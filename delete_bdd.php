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

$id = 1;
$sql = "DELETE FROM user WHERE id_user=?";
$prepare = mysqli_prepare($bdd, $sql);
mysqli_stmt_bind_param($prepare, "i", $id);

if(!mysqli_stmt_execute($prepare))
    die("Problème de mise à jour");

echo "Donnée supprimée";

?>