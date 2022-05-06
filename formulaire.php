<?php 
    $message = null;
    // Récupérer les données envoyées par le formulaire SI et seulement SI des données ont été envoyées
    // isset($variable) = test si une variable existe
    // $_GET["variable"] : récupère le contenu du formulaire envoyé sur la variable "variable"
    if(isset($_POST["prenom"])){
        // Si on entre dans cette condition
        // C'est que le formulaire a été envoyé
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        
        $message = "Bonjour $prenom $nom !";
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traiter un formulaire avec PHP</title>
</head>
<body>
    <h1>Afficher les données récupérée directement depuis un formulaire</h1>
    <form action="#" method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom">
        <input type="text" name="nom" placeholder="Entrez votre nom">
        <input type="submit" value="Envoyer">
    </form>
    <p>
        <?php echo $message;  ?>
    </p>
</body>
</html>