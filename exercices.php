<?php 
/*
    EX 01 :
        Vous allez créer un code qui permet de saisir un prix HT (simulé) et d'afficher le prix TTC correspondant

    TVA : 20%

    Concrètement : 
        - Si le prix HT est de 100€
        - Le prix TTC sera 120€
*/
$prixHT = 515;
$tva = 1.2;

$prixTTC = $prixHT * $tva;

echo "<br/>Le prix HT est $prixHT €, le prix TTC est $prixTTC €";

echo "<br/><br/>";
/*
    EX 02 :
    Créer un programme qui demande d’entrer une note (simulée) et qui affiche :
        - Reçu avec mention assez bien, si la note est supérieure ou égale à 12
        - Reçu avec mention passable, si la note est supérieure à 10 et inférieure à 12
        - Insuffisant, dans tous les autres cas
*/
$note = 16;
if($note >= 12){
    echo "Reçu avec mention assez bien";
} elseif($note > 10 && $note < 12){
    echo "Reçu avec mention passable";
} else {
    echo "Insuffisant";
}


/*
    Créer un programme qui demande une valeur entière (simulée) et qui 
    affiche son double 
        si cette donnée est inférieure à un seuil donné.
*/
$valeur = 25;
$seuil = 15;

if($valeur < $seuil){
    $valeur = $valeur * 2;
}

echo "<br/>La valeur : $valeur";

/*
    Créer un programme qui demande d’entrer une valeur (simulée) et qui affiche :
        - Petit joueur, si la valeur est inférieure à 15
        - Très bon choix !, si la valeur est supérieure à 15 et inférieure à 50
        - Vers l’infini et au-delà, si la valeur est supérieure ou égale à 50
*/



?>