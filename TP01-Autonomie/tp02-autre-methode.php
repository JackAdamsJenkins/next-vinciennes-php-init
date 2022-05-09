<?php 
    // Créer un programme qui permet d’échanger les valeurs de deux variables entrées par l’utilisateur sur
    // un formulaire. 
    /*
        Dans une condition, si vous ne donnez QU'UNE SEULE instruction,
        les accolades sont optionnelles
    */
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
        <input type="text" name="valA" placeholder="Valeur A" value="<?php 
                                                                        if(isset($_GET['valA'])) 
                                                                            echo $_GET['valB']; 
                                                                     ?>">
        <input type="text" name="valB" placeholder="Valeur B" value="<?php if(isset($_GET['valA'])) echo $_GET['valA']; ?>">
        <input type="submit" value="Echanger les valeurs">
    </form>
</body>
</html>