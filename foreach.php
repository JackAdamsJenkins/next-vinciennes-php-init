<?php 
        $notes = array( "Cuneyt" => 15, 
                        "Florence" => 17, 
                        "Haytem" => 19,
                        "Aicha" => 20);

    // La boucle foreach ne récupère QUE la valeur des données (et non la clé)
    foreach($notes as $key => $val){
        echo "<br/>Je suis $key, Voici ma note : $val";
    }
                
?>