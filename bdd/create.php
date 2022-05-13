<?php 
    require_once('connect.php');
    $message = null;

    // Effectuer le traitement SI le formulaire a été envoyé
    if(isset($_POST['submit'])){
        // Si toutes les données ont été remplies
        if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail'])){
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $mail = $_POST['mail'];
            // On ajoute l'utilisateur (si le mail n'existe pas déjà)
            // Je test si l'utilisateur (mail) n'existe PAS déjà
            $sql = "SELECT prenom_user FROM user WHERE mail_user=?";
            $prepare = mysqli_prepare($bdd, $sql);
            mysqli_stmt_bind_param($prepare, "s", $mail);
            mysqli_stmt_execute($prepare);

            // Stocker le resultat en mémoire tampon car on souhaite juste connaitre le nombre
            mysqli_stmt_store_result($prepare);   

            // Si le résultat est > 0, on ne DOIT PAS faire l'enregistrement
            if(mysqli_stmt_num_rows($prepare) > 0){
                // On ne fait PAS l'enregistrement
                $message = "Vous devez utiliser un autre mail";
            } else { // On à 0 mail, on peut faire l'enregistrement
                $sql = "INSERT INTO user(prenom_user, nom_user, mail_user) VALUES(?, ?, ?)";
                $prepare = mysqli_prepare($bdd, $sql);
                mysqli_stmt_bind_param($prepare, "sss", $prenom, $nom, $mail);
                if(mysqli_stmt_execute($prepare) == true){
                    $message = "L'utilisateur à été enregistré";
                } else {
                    $message = "L'utilisateur n'a PAS été enregistré";
                }
            }
        } else {
            $message = "Vous devez renseigner TOUTES les données";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de données</title>
</head>
<body>
    <h1>Création de données</h1>
    <form action="#" method="post">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <input type="email" name="mail" placeholder="Email">
        <input type="submit" name="submit" value="Ajouter l'utilisateur">
    </form>
    <p><?php echo $message; ?></p>
    <p><a href="read.php">Afficher tous les utilisateurs</a></p>
</body>
</html>