<?php 
    // On effectue la connexion
    $server = "localhost";
    $username = "usernext";
    $password = "123456";
    $dbname = "nextformation";

    // Connexion à la base de données
    $bdd = mysqli_connect($server, $username, $password, $dbname);

    // Tester si la connexion est effective
    if(!$bdd)
        die("Vous n'êtes pas connecté");
/*
    Vous allez créer une nouvelle TABLE dans votre base de données
    Cette table devra contenir les informations sur des voitures
    Vous allez devoir stocker les données suivantes :
        - id de données
        - Marque de la voiture (Renault, Peugeot, Mercedes..)
        - Modèle de la voiture (Clio, Twingo, etc.)
        - L'année de fabrication du véhicule
        - Couleur du véhicule (Rouge, bleu, vert)

    Une fois la table créée, vous allez devoir "peupler" les données
    Pour cela, vous allez laisser l'utilisateur remplir les données
    Vous allez donc mettre à disposition de l'utilisateur, un formulaire permettant
    de renseigner ces données et bien évidemment de les ajouter à la base de données

    Une fois qu'une donnée est enregistrée, n'oubliez pas d'afficher un message à l'utilisateur
    pour lui dire que tout s'est bien passé.

    ENSUITE ----
    Dessous le formulaire, vous allez ajouter un h2 avec pour titre "Liste des véhicules"
    Et bien évidemment, sous ce h2, vous allez devoir récupérer et afficher la liste de TOUS les véhicules présents
    dans la base de données


    ENSUITE ---
    Dessous la liste de TOUS les véhicules, ajouter un nouveau h2 avec pour titre "Les derniers véhicules"
    A cet endroit, vous allez afficher les 4 derniers véhicules enregistrés dans la base de données

*/
// L'utilisateur à envoyé le formulaire

// Deuxième étape : on vérifie si le formulaire a été envoyé et si tous les champs sont remplis
$message = "Veuillez renseigner les champs du formulaire";
if(isset($_POST['modele']) && isset($_POST['marque']) && isset($_POST['annee']) && isset($_POST['couleur']) &&
    !empty($_POST['modele']) && !empty($_POST['marque']) && !empty($_POST['annee']) && !empty($_POST['couleur'])){
    // le formulaire a été envoyé ET les données sont TOUTES remplies
    // Troisième étape : On associe les variables post à des variables plus faciles à utiliser
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $couleur = $_POST['couleur'];
    
    // Quatrième étape : On prépare la requête d'enregistrement et on la valide (ajout de données à la bdd)
    // On prépare notre requête
    $prepare = mysqli_prepare($bdd, "INSERT INTO vehicule(marque_vehicule, modele_vehicule, annee_vehicule, couleur_vehicule) VALUES(?, ?, ?, ?)");

    mysqli_stmt_bind_param($prepare, "ssis", $marque, $modele, $annee, $couleur);

    // Vous n'oubliez pas d'exectuer la requête et d'afficher un message si tout se passe bien
    if(mysqli_stmt_execute($prepare))
        $message = "Le véhicule $marque année $annee à bien été ajouté.";


}
?>
<!-- Première étape, vous devez créer la structure HTML et ajouter le formulaire -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de modèles de voitures</title>
</head>
<body>
    <h1>Ajouter un nouveau véhicule</h1>
    <form action="#" method="post">
        <select name="marque">
            <option value="Renault">Renault</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Nissan">Nissan</option>
            <option value="BMW">BMW</option>
        </select>
        <input type="text" name="modele" placeholder="Modèle du véhicule">
        <input type="number" name="annee" placeholder="Année du véhicule">
        <input type="text" name="couleur" placeholder="Couleur">
        <input type="submit" value="Ajouter !">
    </form>
    <p><?php echo $message; ?></p>
    <!-- Cinquième étape : on va afficher la liste des véhicules -->
    <h2>Liste des véhicules</h2>
    <?php 
        // Vous devez executer la requête d'affichage (SELECT) et parcourir TOUTES les données
        // $sql = "SELECT marque_vehicule, modele_vehicule, annee_vehicule, couleur_vehicule FROM vehicule";
        $sql = "SELECT marque_vehicule as marque, modele_vehicule as modele, annee_vehicule as annee, couleur_vehicule as couleur FROM vehicule";
        $result = mysqli_query($bdd, $sql);

        // On parcour le tableau pour afficher les données
        while($data = mysqli_fetch_assoc($result)){
            echo "<p>Marque : ".$data["marque"].", Modèle : ".$data["modele"].", Année : ".$data["annee"].", Couleur : ".$data["couleur"]."</p>";
        }
    ?>

     <!-- Sixième étape : on va afficher les 4 derniers véhicules enregistrés dans la BDD -->
     <h2>Les derniers véhicules</h2>
    <?php 
        $sql = "SELECT marque_vehicule as marque, modele_vehicule as modele, annee_vehicule as annee, couleur_vehicule as couleur FROM vehicule ORDER BY marque ASC LIMIT 4";
        $result = mysqli_query($bdd, $sql);

        // On parcour le tableau pour afficher les données
        while($data = mysqli_fetch_assoc($result)){
            echo "<p>Marque : ".$data["marque"].", Modèle : ".$data["modele"].", Année : ".$data["annee"].", Couleur : ".$data["couleur"]."</p>";
        }
    ?>
</body>
</html>