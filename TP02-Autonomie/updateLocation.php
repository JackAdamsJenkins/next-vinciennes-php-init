<?php 
    // Inclure la connexion à la base de données UNIQUEMENT si j'envoi le formulaire
    $message = null;
    if(isset($_POST['submit'])){
        // On test si TOUS les champs sont remplis
        if(!empty($_POST['nomResidence']) && !empty($_POST['adresseResidence']) && !empty($_POST['nombreLits'])){
           // On effectue la connexion
           require_once('connect.php');
           $sql = "UPDATE location SET nom_location = ?, adresse_location = ?, lit_location = ? WHERE id_location = ?";
           $prepare = mysqli_prepare($bdd, $sql);
           mysqli_stmt_bind_param($prepare, "ssii", $_POST['nomResidence'], $_POST['adresseResidence'], $_POST['nombreLits'], $_GET['id']);
           
           // Si tout est bon, afficher un message
           if(mysqli_stmt_execute($prepare))
                $message = '<p style="color:green;">La modification a été effectuée.</p>';
            else
                $message = '<p style="color:red;">Une erreur est survenue lors de la modification.</p>';

        } else {
            // Au moins un des champ n'est pas rempli
            $message = '<p style="color:red;">Vous devez renseigner tous les champs</p>';
        }
    }

     // Récupère les données en fonction de l'id envoyée par l'URL
     if(isset($_GET['id']) && !empty($_GET['id'])){
        // Effectue la requête pour récupérer les données
        require_once('connect.php');
        $sql = "SELECT nom_location, adresse_location, lit_location FROM location WHERE id_location=?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "i", $_GET['id']);
        mysqli_stmt_execute($prepare);

        // Récupère les résultats
        $getResult = mysqli_stmt_get_result($prepare);

        // Récupère les données
        while($data = mysqli_fetch_assoc($getResult)){
            $nomResidence = $data['nom_location'];
            $adresseResidence = $data['adresse_location'];
            $nombreLits = $data['lit_location'];
        }
    } else {
        // Pas d'ID, on redirige directement sur le dashboard
        header('location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la résidence</title>
</head>
<body>
    <h1>Modifier la résidence</h1>
    <p><a href="dashboard.php">< Retour au tableau de bord</a></p>
    <?php echo $message; ?>
    <form action="#" method="post">
        <input type="text" value="<?php echo $nomResidence; ?>"name="nomResidence" placeholder="Entrez le nom de la résidence" required>
        <input type="text" value="<?php echo $adresseResidence; ?>"name="adresseResidence" placeholder="Entrez l'adresse de la résidence" required>
        <input type="number" name="nombreLits" step="1" value="<?php echo $nombreLits; ?>" placeholder="Combien de lits disponibles ?" required>
        <input type="submit" name="submit" value="Modifier la résidence">
    </form>
</body>
</html>