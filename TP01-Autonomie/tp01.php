<?php 
    // Créer un programme qui permet de saisir un prix HT sur un formulaire et d’afficher le prix TTC
    // correspondant, le prix HT et le montant de la TVA.

    /*
        isset = is Set = est défini 
        emtpy = est vide
    */
    $message = null;
    // Tester si le formulaire a été envoyé (si la variable existe)
    if(isset($_GET['prixHT'])){
        // prix ht
        $prixHT = $_GET['prixHT'];
        // prix ttc
        $prixTTC = $prixHT * 1.2;
        // montant de la tva 
        $montantTVA = $prixTTC - $prixHT;

        // modification de la variable message
        $message = "Le prix HT est ".$prixHT."€, la TVA est de ".$montantTVA."€, le prix TTC est ".$prixTTC."€";
    }
    
 ?>
 <!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>TP01 - Calcul prix</title>
 </head>
 <body>
     <h1>Calculer le prix TTC</h1>
     <form action="#" method="get">
         <input type="number" name="prixHT" placeholder="Entrez un prix HT">
         <input type="submit" value="Calculer">
     </form>
     <p><?php echo $message; ?></p>
 </body>
 </html>