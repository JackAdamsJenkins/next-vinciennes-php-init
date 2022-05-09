<?php 
    // Créer un programme qui permet d’échanger les valeurs de deux variables entrées par l’utilisateur sur
    // un formulaire.

    // 2.0 - On créé les variables qui vont servir à l'affichage
    $message1 = null;
    $message2 = null;

    // Faire l'échange uniquement si le formulaire a été envoyé
    // 3.0 - On créé la condition d'envoi du formulaire avant traitement de données
    if(isset($_GET['valA'])){
        // 4.0 - On traite les données
        $valA = $_GET['valA'];
        $valB = $_GET['valB'];

        // 4.1 - On modifie la variable d'affichage
        $message1 = "La première valeur est $valA, la deuxième valeur est $valB";

        // On change les valeurs
        $valTemp = $valA;
        $valA = $valB;
        $valB = $valTemp;

        // 4.2 - On modifie la variable d'affichage finale
        $message2 = "La première valeur est $valA, la deuxième valeur est $valB";

    }
    
?>
<!-- 1.0 - on créé le HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP02 - Echanger les données</title>
</head>
<body>
    <h1>Echange de données</h1>
    <form action="#" method="get">
        <!-- 1.1 - On n'oublie pas de créer le formulaire avec les valeurs qu'on doit traiter -->
        <input type="text" name="valA" placeholder="Valeur A">
        <input type="text" name="valB" placeholder="Valeur B">
        <input type="submit" value="Echanger les valeurs">
    </form>
    <!-- 2.1 - On n'oublie pas de faire un echo de nos variables d'affichage -->
    <p><?php echo $message1; ?></p>
    <p><?php echo $message2; ?></p>
</body>
</html>