<?php 
    require_once('connect.php');
    // On récupère l'id
    if(isset($_GET['id']) && !empty($_GET['id'])){
        // vérifier si un utilisateur avec cet id existe dans la bdd
        $sql = "SELECT prenom_user as prenom, nom_user as nom, mail_user as mail FROM user WHERE id_user=?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "i", $_GET['id']);
        mysqli_stmt_execute($prepare);

        // Stocker le resultat en mémoire tampon car on souhaite juste connaitre le nombre
        mysqli_stmt_store_result($prepare);   

        // Si > 0, on est good, sinon on renvoi un message d'erreur
        if(mysqli_stmt_num_rows($prepare) > 0){
            // L'utilisateur existe, on va pouvoir l'afficher pour le mettre à jour
            mysqli_stmt_execute($prepare);
            $getResult = mysqli_stmt_get_result($prepare);
            while($data = mysqli_fetch_assoc($getResult)){
                $prenom = $data['prenom'];
                $nom = $data['nom'];
                $mail = $data['mail'];
            }

        } else {
            // L'utilisateur n'existe pas, on renvoi sur la page de lecture
            header('location: read.php?err=1');
        }
    } else {
        // Renvoyer sur la page de lecture, avec un message
        header('location: read.php?err=1');
    }
    // On cherche si l'id existe dans la base de données
    // On affiche les données

    // On test si le formulaire a été envoyé (pour la mise à jour)
        // on met à jour les données dans la base de données
    $message = null;
    if(isset($_POST['submit']) && isset($_GET['id'])){
        // Associer les données sur des variables
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $id = $_GET['id'];

        // Faire la mise à jour dans la base de données
        $sql = "UPDATE user SET prenom_user=?, nom_user=?, mail_user=? WHERE id_user=?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "sssi", $prenom, $nom, $mail, $id);

        // Si la mise à jour fonctionne, on affiche un message
        if(mysqli_stmt_execute($prepare)){
            $message = "Utilisateur mis à jour";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour l'utilisateur</title>
</head>
<body>
    <h1>Mettre à jour l'utilisateur</h1>
    <p><?php echo $message; ?></p>
    <form action="#" method="post">
        <input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $prenom; ?>">
        <input type="text" name="nom" placeholder="Votre Nom" value="<?php echo $nom; ?>">
        <input type="email" name="mail" placeholder="Votre Email" value="<?php echo $mail; ?>">
        <input type="submit" name="submit" value="Mettre à jour">
    </form>
    <p><a href="read.php">Retour à la liste des utilisateurs</a></p>
</body>
</html>