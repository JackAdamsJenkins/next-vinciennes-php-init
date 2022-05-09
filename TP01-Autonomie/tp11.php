<?php 
// À l’aide de la boucle conçue pour cela, affichez toutes les données du tableau associatif
require('tp09.php');

foreach($perso as $cle => $valeur){
    echo "Votre $cle est $valeur <br/>";
}

?>