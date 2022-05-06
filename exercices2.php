<?php 
    /*
        Avec la boucle for, afficher tous les nombres pairs de 0 à 50 (inclu)
    */
    for($i = 0; $i <= 50; $i += 2){
        echo "<br/>Nombre pair : $i";
    }

    // $i = $i + 2;
    // $i += 2; // équivalent à la ligne au dessus


    /*
        Avec la boucle for, afficher tous les nombres impairs de 0 à 88 
    */
    for($i = 1; $i <= 88; $i = $i + 2){
        echo "<br/>Nombre impair : $i";
    }


    /*
        Avec la boucle while, afficher tous les nombres pairs de 0 à 50 (inclu)
    */
    $i = 0;

    while($i <= 50){
        echo "<br/> Nombre pair : $i";

        $i += 2;
    }


    /*
        Avec la boucle while, afficher tous les nombres impairs de 1 à 88 
    */
    $i = 1;
    while($i <= 88){
        echo "<br/>Nombre impair : $i";

        $i += 2;
    }


?>