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

$id = 7;
$sql = "SELECT prenom_user, nom_user FROM user WHERE id_user=?";
$prepare = mysqli_prepare($bdd, $sql);
mysqli_stmt_bind_param($prepare, "i", $id);
mysqli_stmt_execute($prepare);

// Récupère tous les résultats
$getResult = mysqli_stmt_get_result($prepare);

// Récupère les données
while($data = mysqli_fetch_assoc($getResult)){
    // var_dump($data);
    echo "<p>Votre prénom est ".$data["prenom_user"].", votre nom est ".$data["nom_user"]."</p>";
}


?>