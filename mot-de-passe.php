<?php 
    require_once('connect.php');
/*
    La gestion des mots de passe est un problème courant.
    Il faut donc savoir stocker correctement les mots de passe.
    Pour cela, une bonne pratique consiste à effectuer un hashage de mot de passe.

    Il existe une fonction sécurisée qui permet le hashage de mot de passe.

    La fonction password_hash() fait un hashage de mot de passe FORT et IRREVERSIBLE
*/

// $motDePasse = "123456";

// $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

// echo $hash;

/*
    on ne peut PAS effectuer l'opération inverse avec un mot de passe hashé
    Cependant, il existe une fonctionnalité pour vérifier si le mot de passe entré par l'utilisateur
    est le même que celui enregistré dans la base de données : password_verify()

    La fonction password_verify() rentournera true si le mot de passe et le hachage correspondent, et false si ce n'est pas le cas

    password_verify("Mot de passe à vérifier", "mot de passe original HASHE")
*/

// if(password_verify("123456", $hash))
//     echo "<br/>Le mot de passe est valide !";
// else
//     echo "<br/>Le mot de passe n'est PAS valide";

// On test si le formulaire d'inscription a été envoyé
$message = null;
if(isset($_POST['mail']) && isset($_POST['pwd']) && !empty($_POST['mail']) && !empty($_POST['pwd'])){
    // On commence par récupérer les infos et les attribuer a des variables
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    // HASHER LE MOT DE PASSE
    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    // Vérifier si le mail n'existe pas déjà dans la base de données
    $sql = mysqli_prepare($bdd, "SELECT id_member FROM member WHERE mail_member=?");
    mysqli_stmt_bind_param($sql, "s", $mail);
    mysqli_stmt_execute($sql);
    
    // Récupèrer le nombre de lignes correspondantes à la requête
    // On stock le résultat dans une mémoire tampon interne
    mysqli_stmt_store_result($sql);
    // On ajoute le résultat sur une variable
    $nbLignes = mysqli_stmt_num_rows($sql);

    // Si le nombre de lignes et > 0 : on affiche une erreur (le mail existe déjà)
    if($nbLignes > 0){
        $message = "Cette adresse mail existe déjà.";
    } else { // Sinon on peut faire l'enregistrement
        // Ajout des données à la base de données
        // On prépare notre requête
        $prepare = mysqli_prepare($bdd, "INSERT INTO member(mail_member, pwd_member) VALUES(?, ?)");

        mysqli_stmt_bind_param($prepare, "ss", $mail, $hash);

        // // Vous n'oubliez pas d'exectuer la requête et d'afficher un message si tout se passe bien
        if(mysqli_stmt_execute($prepare))
            $message = "L'utilisateur a été ajouté !";
    }
}

$isUserConnected = false;
$errorMessage = null;
// On test si le formulaire de connexion a été envoyé
if(isset($_POST['mail2']) && isset($_POST['pwd2']) && !empty($_POST['mail2']) && !empty($_POST['pwd2'])){
    // On commence par récupérer les infos et les attribuer a des variables
    $mail = $_POST['mail2'];
    $pwd = $_POST['pwd2'];

    // Pour vérifier le mot de passe, il faut sélectionner UN utilisateur dans la base de données
    // Pour cela, on sait que (normalement) le mail doit être UNIQUE
    // On commence donc par effectuer une requête à la base de données pour récupérer :
        // le password HASHE qui correspond avec le mail entré
    // Si je récupère 0 résultat > je n'ai AUCUN utilisateur enregistré avec cette adresse mail
    $sql = "SELECT pwd_member as pwd FROM member WHERE mail_member=? LIMIT 1";
    $prepare = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($prepare, "s", $mail);
    // On s'arrête ici pour l'instant
    mysqli_stmt_execute($prepare);
    // Récupérer UN seul résultat
    $getResult = mysqli_stmt_get_result($prepare);

    // Récupère les données et effectue le test de mot de passe
    while($data = mysqli_fetch_assoc($getResult)){
        // $data['pwd'];
        // Vérifier le mot de passe et le hash
        if(password_verify($pwd, $data['pwd'])){
            $isUserConnected = true;
        } else {
            $errorMessage = "Les mots de passe ne correspondent PAS, vous n'êtes PAS connecté";
        }
    }
  
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un mot de passe en BDD</title>
</head>
<body>
    <!-- Si l'utilisateur n'est PAS connecté, afficher ce qu'il y a dessous -->
    <?php if(!$isUserConnected) { ?>
        <h1>Créer un nouveau compte utilisateur</h1>
        <form action="#" method="post">
            <input type="email" name="mail" placeholder="Votre email" required>
            <input type="password" name="pwd" placeholder="Mot de passe" required>
            <input type="submit" value="Inscription">
        </form>
        <p><?php echo $message; ?></p>

        <h2>Connexion utilisateur</h2>
        <form action="#" method="post">
            <input type="email" name="mail2" placeholder="Votre email" required>
            <input type="password" name="pwd2" placeholder="Mot de passe" required>
            <input type="submit" value="Connexion">
        </form>
        <p style="color:red;"><?php echo $errorMessage; ?></p>
    <?php } else { ?>    
        <h1>Tableau de bord</h1>
        <p>Bonjour utilisateur</p>
    <?php } ?>
    <!-- Si l'utilisateur est connecté, afficher un message style "Bonjour" -->
</body>
</html>