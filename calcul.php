<?php 
    // Variable qui va contenir le résultat du calcul
    $resultat = "";

    $valA = $_GET['num1']; // Récupère le contenu du champ num1
    $valB = $_GET['num2']; // Récupère le contenu du champ num2

    $resultat = $valA + $valB;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Une simple calculatrice</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Une simple calculatrice</h1>
    <form action="#" method="get">
        <input type="number" name="num1" placeholder="Nombre 1"> +
        <input type="number" name="num2" placeholder="Nombre 2">
        <input type="submit" value="Calculer !">
    </form>
    <p>Résultat du calcul : <?php echo $resultat; ?></p>
</body>
</html>