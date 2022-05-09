<?php 
// Écrire une boucle qui permet d’afficher le tableau de multiplication jusqu’à 10 d’un entier positif
// choisi par l’utilisateur
$message = null;
if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    for($i = 1; $i <= 10; $i++){
        $resultat = $nombre * $i;
        // Récupère le contenu qu'il y a déjà sur la variable
        // Ajoute le nouveau contenu
        $message .= "$i x $nombre = $resultat<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP05 - Table multiplication</title>
</head>
<body>
    <h1>Afficher la table de multiplication</h1>
    <form action="#" method="post">
        <input type="number" name="nombre" placeholder="Entrez un entier positif">
        <input type="submit" value="Afficher la table">
    </form>
    <p> <?php echo $message; ?>
        <?php
            // if(isset($_POST['nombre'])){
            //     $nombre = $_POST['nombre'];
            //     for($i = 1; $i <= 10; $i++){
            //         $resultat = $nombre * $i;
            //         echo "$i x $nombre = $resultat<br/>";
            //     }
            // }
        ?>
    </p>
</body>
</html>