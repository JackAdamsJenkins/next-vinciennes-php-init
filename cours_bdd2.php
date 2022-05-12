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

// echo "Vous êtes connecté";

/*
    4 types de requêtes possibles
        - Ajouter des données
        - Lire des données
        - Modifier des données
        - Supprimer des données

    Système CRUD
        - Create
        - Read
        - Update
        - Delete
*/

// Insérer des données (create)
/*
    INSERT INTO nom_de_la_TABLE(clé1, clé2, clé3) VALUES('Valeur 1', 'Valeur 2', 'Valeur 3')
*/
$message = null;
if(isset($_POST['prenom'])){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    // $sql = mysqli_prepare(baseDeDonnees, laReQuete);
    $prepare = mysqli_prepare($bdd, "INSERT INTO user(mail_user, nom_user, prenom_user) VALUES(?, ?, ?)");
    // mysqli_stmt_bind_param(requetePreparee, "type_de_donnee", donnee1, donnee2, donnee3);
            // Type : integer, string, decimal
            // On utilise UNIQUEMENT la première lettre
            // Si vous envoyez PLUSIEURS données (?, ?, ?)
                // Il faut préciser le type de CHACUNE des données
    // mysqli_stmt_bind_param($prepare, "sis");
    // mysqli_stmt_bind_param($prepare, "sss");
    mysqli_stmt_bind_param($prepare, "sss", $mail, $nom, $prenom);

    // Executer la requête préparée
    // mysqli_stmt_execute($prepare);
    if(!mysqli_stmt_execute($prepare))
        die('Erreur');
    
    $message = "Utilisateur ajouté à la base de données";
}

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
    <form action="#" method="post">
        <input type="text" name="prenom" placeholder="Votre prénom">
        <input type="text" name="nom" placeholder="Votre nom">
        <input type="email" name="mail" placeholder="Votre Email">
        <input type="submit" value="Ajouter l'utilisateur">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>