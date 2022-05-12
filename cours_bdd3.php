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


// Afficher les données qui se trouvent dans la base de données
// Sélectionne TOUTES(*) les données de ma table USER
$sql = "SELECT * FROM user ORDER BY id_user DESC LIMIT 3";
// Execution de la requête SQL
$req = mysqli_query($bdd, $sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données</title>
</head>
<body>
    <h1>Lecture de données</h1>
    <?php 
        while($data = mysqli_fetch_row($req)){
            // On obtient un tableau
            // Afficher à l'écran le contenu d'une variable/tableau
            // var_dump($data);
            // On récupère 4 données par lignes
            // $data[0] : la donnée du PREMIER champ dans la base de données (id_user)
            // $data[1] : la donnée du DEUXIEME champ dans la base de données (prenom_user)
            echo "<p>Votre id est ".$data[0].", votre prénom est ".$data[1]."</p>";
        }

        // while($data = mysqli_fetch_assoc($req)){
        //     // On obtient un tableau
        //     // Afficher à l'écran le contenu d'une variable/tableau
        //     // var_dump($data);
        //     // On récupère 4 données par lignes
        //     // $data[0] : la donnée du PREMIER champ dans la base de données (id_user)
        //     // $data[1] : la donnée du DEUXIEME champ dans la base de données (prenom_user)
        //     echo "<p>Votre id est ".$data["id_user"].", votre prénom est ".$data["prenom_user"]."</p>";
        // }
    
    ?>
</body>
</html>