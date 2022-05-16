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
           $sql = "INSERT INTO customer(nom_customer, prenom_customer, adresse_customer, phone_customer, nbresident_customer, dureeresidence_customer, id_location) VALUES(?, ?, ?, ?, ?, ?, ?)";
           $prepare = mysqli_prepare($bdd, $sql);
           mysqli_stmt_bind_param($prepare, "ssssiii", $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['numero'], $_POST['nbResident'], $_POST['dureeResidence'], $_POST['lieuResidence']);
           
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
    <title>Ajouter un nouveau résident</title>
</head>
<body>
    <h1>Ajouter un nouveau résident</h1>
    <p><a href="dashboard.php">< Retour au tableau de bord</a></p>
    <?php echo $message; ?>
    <form action="#" method="post">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="adresse" placeholder="Adresse">
        <input type="text" name="numero" placeholder="+(33) 00 00 00 00 00">
        <input type="number" name="nbResident" value="1" step="1" placeholder="Nombre de résidents">
        <input type="number" name="dureeResidence" value="1" step="1" placeholder="Durée résidence en jour">
        <select name="lieuResidence">
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
        <input type="submit" name="submit" value="Ajouter le client">
    </form>
</body>
</html>