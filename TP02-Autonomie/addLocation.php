<?php 
    // Inclure la connexion à la base de données UNIQUEMENT si j'envoi le formulaire
    $message = null;
    if(isset($_POST['submit'])){
        // On test si TOUS les champs sont remplis
        if(!empty($_POST['nomResidence']) && !empty($_POST['adresseResidence']) && !empty($_POST['nombreLits'])){
           // On effectue la connexion
           require_once('connect.php');
           $sql = "INSERT INTO location(nom_location, adresse_location, lit_location) VALUES(?, ?, ?)";
           $prepare = mysqli_prepare($bdd, $sql);
           mysqli_stmt_bind_param($prepare, "ssi", $_POST['nomResidence'], $_POST['adresseResidence'], $_POST['nombreLits']);
           
           // Redirige sur le tableau de bord, si les données sont ajoutées correctement
           if(mysqli_stmt_execute($prepare))
                header('location: dashboard.php');
            else
                $message = '<p style="color:red;">Une erreur est survenue lors de l\'ajout à la base de données</p>';

        } else {
            // Au moins un des champ n'est pas rempli
            $message = '<p style="color:red;">Vous devez renseigner tous les champs</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle résidence</title>
</head>
<body>
    <h1>Ajouter une nouvelle résidence</h1>
    <p><a href="dashboard.php">< Retour au tableau de bord</a></p>
    <?php echo $message; ?>
    <form action="#" method="post">
        <input type="text" name="nomResidence" placeholder="Entrez le nom de la résidence" required>
        <input type="text" name="adresseResidence" placeholder="Entrez l'adresse de la résidence" required>
        <input type="number" name="nombreLits" step="1" value="1" placeholder="Combien de lits disponibles ?" required>
        <input type="submit" name="submit" value="Ajouter la résidence">
    </form>
</body>
</html>