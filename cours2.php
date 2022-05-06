<?php 
    /*
        Objectifs du jour :
            - Les boucles
            - Les inclusions de fichier
            - Les fonctions
            - La manipulation de formulaires
            - L'upload de fichier
    */

    /*
        Les boucles : 
            - for (pour)
            - while (tant que)
            - do..while (répéter, tant que)
            - foreach (pour chaque)
    */

    /*
        Incrémentation et la décrémentation
    */
    $i = 10;
    $i = $i + 1; // 11 (incrémentation)
    $i = $i - 1; // 10 (décrémentation)

    $i++; // incrémentation (11)
    $i--; // décrémentation (10)

    /*
        La boucle for : 

        for(variable de compteur; condition; modification de la variable de compteur){
            // Faire quelque chose
        }
    */

    /*
        Comment faire pour afficher sur la page web tous les nombres de 1 à 10 ?
    */
    for($i = 1; $i <= 10; $i++){
        // echo "<br/>Voici la valeur de i : $i";
    }

     /*
        Comment faire pour afficher sur la page web 1 nombre sur 4 de 1 à 100?
    */
    for($i = 1; $i <= 100; $i = $i + 4){
        echo "<br/>Voici la valeur de i : $i";
    }

    /*
        La boucle while

        // amorce = l'initialisation de la variable de compteur

        while(condition){
            // instructions

            // Modification de l'amorce
        }
    */
    /*
        Comment faire pour afficher sur la page web tous les nombres de 1 à 10 ?
    */
    $amorce = 1;

    while($amorce <= 10){
        echo "<br/>Valeur de l'amorce : $amorce";

        $amorce++;
    }

    $compte = "Abonné";

    // while($compte != "Administrateur" OR ($i < 4 AND $nb > 12)){
    //     echo "<br/>Vous n'êtes pas administrateur";

    //     // Tirer un nombre au hasard entre 1 et 5
    //     // Si le nombre est 4, changer le contenu de la variable compte par "Administrateur"
    // }


    /*
        Comment faire pour afficher sur la page web 1 nombre sur 4 de 1 à 100?
    */
    for($i = 1; $i <= 100; $i = $i + 4){
        echo "<br/>Voici la valeur de i : $i";
    }

    $i = 1;
    while( $i <= 100 ){
        echo "<br/>Voici la valeur de i : $i";
        $i = $i + 4;
    }

    // La boucle do...while
    /*
        Cette boucle s'execute AU MOINS UNE FOIS
        QUOI QU'IL ARRIVE
        Même si la condition n'est pas remplie

        // amorce

        do {
            // instructions

            // Modification de l'amorce
        } while( conditions );
    */
    $i = 999;
    do {
        echo "<br/>Voici la valeur de i : $i";
        $i = $i + 4;
    } while( $i <= 100);


    /* 
        La boucle foreach (pour chaque) :
            - Essentielle pour parcourir les données d'un tableau
            - La valeur, l'indice, et la clé d'un tableau
    */

    /*
        Les tableaux indexés :
            - Un indice (un nombre de référence)
            - Une valeur

            tableauIndex
        Indice      Valeur
        0           15
        1           "Toto"
        2           true


        Les tableaux associatifs
            - Une clé
            - Une valeur
        
            personnage
        Clé         Valeur
        Prénom      Jean-Louis
        Nom         Errante
        Age         35
        Taille      174
    */

    $notes[0] = 15;
    $notes[1] = 18;
    $notes[2] = 13;

    echo $notes[0]; // 15

    // 2e façon d'écrire un tableau indexé
    $notes = array(15, 18, 13, 26, 42, "Toto", "Tata");

    echo $notes[5]; // "Toto"
    echo $notes[4]; // 42


    // Tableau associatif
                // clé   =  Valeur
    $personnage["prenom"] = "Jean-Louis";
    $personnage["nom"] = "Errante";
    $personnage["age"] = 35;
    $personnage["taille"] = 174;
    
    echo $personnage["nom"]; // "Errante"

    // 2e façon d'écrire le tableau associatif
                    // clé   => valeur
    $notes = array( "Cuneyt" => 15, 
                    "Florence" => 17, 
                    "Haytem" => 19,
                    "Aicha" => 20);

    $notes["Chaira"] = 18;

    echo $notes["Haytem"]; // 19;

    $i = "Toto";

    echo $i; // Toto

    echo "<br/>Je suis Florence et ma note est : ".$notes["Florence"];
    echo "<br/>Je suis Florence et ma note est : ".$notes["Haytem"];
    echo "<br/>Je suis Florence et ma note est : ".$notes["Aicha"];
    echo "<br/>Je suis Florence et ma note est : ".$notes["Cuneyt"];

    /*
        La boucle foreach pour parcourir toutes les données d'un tableau
        Foreach prend en premier paramètre un tableau
        En deuxième paramètre (as), on NOMME ce que contient le tableau (on créé une variable temporaire)
        En troisième paramètre (optionnel), on peut associer les clés et les valeurs
    */

    foreach($notes as $val){
        echo "<br/>Je suis Florence et ma notes est : $val";
    }

    /*
        Pour afficher à la fois la CLE et la VALEUR, il faut utiliser le troisème paramètre

                            // cle et valeur sont des variables que VOUS nommez
        foreach($nomDuTable as $cle => $valeur)
    */
                    // clé => valeur
    foreach($notes as $key => $value){
        echo "<br/>Je m'appelle $key et ma note est $value";
    }

    /*
       Nous avons vu :
            - Les boucles
            
        Il reste à voir :
            - Les inclusions de fichier
            - Les fonctions
            - La manipulation de formulaires
            - L'upload de fichier
    */

    // Ajouter le contenu d'un fichier à un autre fichier
    //      chemin du fichier à inclure
    include("site/header.php");
    require("site/header.php");

    /*
        include et require font la même chose
        a UNE exception près

        include tentera d'ajouter le fichier, s'il ne trouve pas le fichier, il passera à la suite du code

        require tentera d'ajouter le fichier, s'il ne le trouve pas, il va arrêté le code et afficher une erreur
    */

    /*
        Variante au include et require :
            ajout de _once

        La particularité de _once étant que le fichier ne peut s'inclure QU'UNE SEULE FOIS
    */
    include_once("site/header.php");
    require_once("site/header.php");

     /*
       Nous avons vu :
            - Les boucles
            - Les inclusions de fichier
            
        Il reste à voir :
            - Les fonctions
            - La manipulation de formulaires
            - L'upload de fichier
    */

    /*
        Les fonctions

        On distingue deux types de fonctions :
            - Celles qui existent déjà dans le langage de programmation
            - Celles que vous allez rédiger vous-même

        Par exemple, fonctions qui existent déjà dans le langage de programmation :
            - echo()
            - strtoupper() : permet de mettre une chaîne de cartère en MAJUSCULE
            - empty() : permet de savoir si une variable est vide
            - !empty(variable) : permet de savoir si la variable n'est PAS vide
            - ucfirst(variable ou chaine de caractère) : met uniquement la première lettre de la chaine de caractère en majuscule

        Les fonctions que vous créer vous-même
            - Une fonction qui permet d'additionner deux nombres entrés par l'utilisateur
    */

    echo "<br/>Bonjour, je suis Jean-Louis";
    // echo strtoupper("<br/>Bonjour, je suis Jean-Louis");
    $message = "<br/>Bonjour, je suis Jean-Louis";
    echo strtoupper($message);

    $message = "";
    // Si la variable message est vide
    if(empty($message)){
        echo "<br/>La variable est vide";
    }


    /*
        Ecrire vos propres fonctions
            - écrire le mot clé : function
            - vous faites un espace
            - vous écrivez le nom de la fonction (suivre les mêmes règles de nommage que pour les variables)
            - on ouvre et on referme les parenthèses ()
            - a l'intérieur des parenthèses, il peut y avoir des arguments (= variables)
                - si vous voulez traiter PLUSIEURS variables, vous devez les séparer par une virgule
            - on ouvre après les parenthèses les accolades {}
            - a l'intérieur des accolades, on écrit nos instructions

        Deux choses possibles :
            - Renvoyer un résultat précis (un chaine de caractère, un nombre, un tableau)
                - return
                - par exemple : return $nb1;
            - Afficher directement le résultat :
                - echo

        Dans une fonction, dès que le return est exécuté, la fonction s'arrête

        Pour utiliser une fonction, il faut faire appel à elle

    */

    // Créer une fonction qui permet de dire bonjour/bonsoir + prénom
    // en fonction d'une variable de temps
    function direBonjour($prenom = null, $temps = null){
        // temps DOIT être un INTEGER
        if($prenom == null){
            echo "<br/>Hello toi !";
        } elseif($temps == null){
            echo "<br>Salut $prenom !";
        } elseif($temps > 17){
            echo "<br>Bonsoir $prenom, il est $temps heures !";
        } else {
            echo "<br/>Bonjour $prenom, il est $temps heures !";
        }
    }

    // date('H'); // Affiche l'heure actuelle (en fonction de la configuration du serveur et du règlage du fuseau horaire)

    $heure = date('H') + 2;

    direBonjour("Jean-Louis", $heure);
    $etudiant = "Cuneyt";

    direBonjour($etudiant, 18);

    direBonjour("Haytem", 6);
    direBonjour("Aïcha");

    direBonjour();

    // Créer une fonction qui permet d'addition deux nombres
    function addition($a = 0, $b = 0){
        $resultat = $a + $b;
        // renvoi le résultat de l'addition
        return $resultat;
    }

    $calcul1 = addition(10, 20);
    $calcul2 = addition(8, 12);
    $nb1 = 5;
    $calcul3 = addition($nb1, 12);
   
    // Afficher le résultat
    echo "<br/>Le résultat du calcul 10 + 20 = $calcul1";

    $calcul4 = $calcul1 + $calcul2 + addition(6, 4);

    echo "<br/>Le résultat du calcul4 est $calcul4";


    function direBonjour2($prenom = null, $temps = null){
        // temps DOIT être un INTEGER
        if($prenom == null){
            return "Hello toi !";
        } elseif($temps == null){
            return "Salut $prenom !";
        } elseif($temps > 17){
            return "Bonsoir $prenom, il est $temps heures !";
        } else {
            return "Bonjour $prenom, il est $temps heures !";
        }
    }

    $bonjour = direBonjour2("Chaira");

    echo "<br/> $bonjour";

    /*
       Nous avons vu :
            - Les boucles
            - Les inclusions de fichier
            - Les fonctions
            - La manipulation de formulaires
            - L'upload de fichier
            
        Il reste à voir :

        La manipulation de formulaires : 
            - Récupérer les données envoyées par un formulaire HTML
        
        Il existe deux méthodes d'envoie de données par un formulaire HTML : 
            - GET : Transmet les données par l'url (par l'adresse de la page)
            - POST : Transmet les données directement au serveur en passant par une requête post (invisible pour l'utilisateur)

            - GET : a utiliser lorsque vous transmettez des données NON SENSIBLES
            - POST : Si vous avez des données qui ne doivent pas être affichées en clair, choisissez cette méthode
    */

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

?>