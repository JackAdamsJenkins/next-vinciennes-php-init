<?php 
    /*
        Créez une fonction qui permet d'afficher simplement le contenu d'une variable transmise
    */
    function afficheContenu($maVariable){
        echo $maVariable;
    }

    afficheContenu("Bonjour à tous !");
    
    
    /*
        Créez une fonction qui permet de multiplier deux nombres et RETOURNER (return) son résultat
    */
    function multiplier($nb1 = 0, $nb2 = 0){
        return $nb1 * $nb2;
    }

    echo "<br/>".multiplier(6, 2);

    /*
        Créez une fonction qui permet de prendre 3 paramètres :
            - La fonction doit retourner le résultat de :
                - L'addition du premier et deuxième paramètre
                - La multiplication du résultat par le troisième paramètre

        Exemple : 10, 20, 2
        La fonction doit renvoyer : (10 + 20) * 2 = 60

        1ere info = 1
        2e info = 2
        3e info = 2
    */
    function renvoiResultat($nb1 = 0, $nb2 = 0, $nb3 = 0){
        return ($nb1 + $nb2) * $nb3;
    }

    echo "<br/>Résultat du calcul : ".renvoiResultat(10, 20, 2);


?>