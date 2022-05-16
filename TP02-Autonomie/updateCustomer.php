<?php 
    // Inclure la connexion à la base de données UNIQUEMENT si j'envoi le formulaire
    $message = null;
    if(isset($_POST['submit'])){
        // On test si TOUS les champs sont remplis
        if(!empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['adresse']) &&
        !empty($_POST['numero']) &&
        !empty($_POST['nbResident']) &&
        !empty($_POST['dureeResidence']) &&
        !empty($_POST['lieuResidence'])){
           // On effectue la connexion
           require_once('connect.php');
           $sql = "UPDATE customer SET nom_customer = ?, prenom_customer = ?, adresse_customer = ?, phone_customer = ?, nbresident_customer = ?, dureeresidence_customer = ?, id_location = ? WHERE id_customer = ?";
           $prepare = mysqli_prepare($bdd, $sql);
           mysqli_stmt_bind_param($prepare, "ssssiiii", $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['numero'], $_POST['nbResident'], $_POST['dureeResidence'], $_POST['lieuResidence'], $_GET['id']);
           
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
    

        $sql = "SELECT nom_customer, prenom_customer, adresse_customer, phone_customer, nbresident_customer, dureeresidence_customer, id_location FROM customer WHERE id_customer=?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "i", $_GET['id']);
        mysqli_stmt_execute($prepare);

        // Récupère les résultats
        $getResult = mysqli_stmt_get_result($prepare);

        // Récupère les données
        while($data = mysqli_fetch_assoc($getResult)){
            $nom = $data['nom_customer'];
            $prenom = $data['prenom_customer'];
            $adresse = $data['adresse_customer'];
            $numero = $data['phone_customer'];
            $nbResident = $data['nbresident_customer'];
            $dureeResidence = $data['dureeresidence_customer'];
            $idLocation = $data['id_location'];
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
        <input type="text" name="nom" value="<?php echo $nom; ?>" placeholder="Nom">
        <input type="text" name="prenom" value="<?php echo $prenom; ?>" placeholder="Prénom">
        <input type="text" name="adresse" value="<?php echo $adresse; ?>" placeholder="Adresse">
        <input type="text" name="numero" value="<?php echo $numero; ?>" placeholder="+(33) 00 00 00 00 00">
        <input type="number" name="nbResident" value="<?php echo $nbResident; ?>" step="1" placeholder="Nombre de résidents">
        <input type="number" name="dureeResidence" value="<?php echo $dureeResidence; ?>" step="1" placeholder="Durée résidence en jour">
        <select name="lieuResidence">
            <!-- Récupérer la valeur actuelle du lieu de résidence -->
            <?php 
                require_once('connect.php');
                $sql = "SELECT id_location, nom_location, lit_location FROM location WHERE id_location = ?";
                $prepare = mysqli_prepare($bdd, $sql);
                mysqli_stmt_bind_param($prepare, "i", $idLocation);
                mysqli_stmt_execute($prepare);

                $getResult = mysqli_stmt_get_result($prepare);

                while($data = mysqli_fetch_assoc($getResult)){
                    $idLocation = $data['id_location'];
                    $nom_location = $data['nom_location'];
                    $lit_location = $data['lit_location']; 
                ?>
                    <option value="<?php echo $idLocation; ?>"><?php echo $nom_location; ?>(<?php echo $lit_location; ?> lits)</option>
                <?php
                }
            ?>
            <!-- Peupler les lieux de résidence -->
            <?php 
                require_once('connect.php');
                $sql = "SELECT id_location, nom_location, lit_location FROM location";
                $req = mysqli_query($bdd, $sql);

                while($data = mysqli_fetch_assoc($req)){
                    $idLocation = $data['id_location'];
                    $nom_location = $data['nom_location'];
                    $lit_location = $data['lit_location']; 
                ?>
                
                <option value="<?php echo $idLocation; ?>"><?php echo $nom_location; ?>(<?php echo $lit_location; ?> lits)</option>
                <?php
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Modifier le client">
    </form>
</body>
</html>