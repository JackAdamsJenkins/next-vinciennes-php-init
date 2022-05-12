<?php 
    // Ternaires : Conditions condensées
    // if / else sur une seule ligne
    // Qui à pour but d'attribuer une VALEUR à une variable
    // variable = (condition) ? valeur si vrai : valeur si faux;

    $age = 18;

    $amIMajor = ($age >= 18) ? "Oui" : "Non";

    echo $amIMajor; // Affichera "Oui"

    $age = 15;

    $amIMajor = ($age >= 18) ? "Oui" : "Non";

    echo $amIMajor; // Affichera "Non"

    // équivalent de :
    $age = 15;
    if($age >= 18){
        $amIMajor = "Oui";
    } else {
        $amIMajor = "Non";
    }

    $amIMajor = ($age >= 18) ? 10 + 5 + $age : "Non"; // "Non"

    

?>