<?php 
// Créer un programme qui demande UNE valeur entière et qui AFFICHE son triple si cette donnée est
// inférieure à un seuil donné. Si la valeur est supérieure au seuil, elle doit afficher sa valeur divisée par
// le seuil.

// 2.0 - Variable qui va servir à l'affichage
$message = null;

// 3.0 - Vérifier si le formulaire a été envoyé
if(isset($_GET['nombre'])){
    // 4.0 - Traitement des données (calcul)
    $seuil = 50;
    
    $nombre = $_GET['nombre'];

    // if($nombre <= $seuil){
    //     $nombre *= 3;
    //     // $nombre = $nombre * 3; // équivalent à ligne du dessus
    // } else {
    //     $nombre = $nombre / $seuil;
    // }

    if($nombre <= $seuil)
        $nombre *= 3;
    else
        $nombre = $nombre / $seuil;

    // 4.1 - Modification du message
    $message = "Voici votre nombre final : $nombre";

}


?>
<!-- 1.0 - On créé le HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP03</title>
</head>
<body>
    <h1>Calcul par rapport a un seuil</h1>
    <form action="#" method="get">
        <!-- UNE seule valeur demandée à l'utilisateur -->
        <input type="number" step="1" name="nombre" placeholder="Entrez une valeur entière">
        <input type="submit" value="Envoyer">
    </form>
    <!-- 4.2 - Ajout de la variable d'affichage -->
    <p><?php echo $message; ?></p>
</body>
</html>