<?php 
    // Commentaire sur une seule ligne
    // ctrl + :/
    // Mon commentaire

    # Autre type de commentaire sur une seule ligne

    /*
        Vos commentaires
        Sur plusieurs
        lignes sans
        soucis
    */

    // Fonction qui permet d'afficher du contenu sur votre page HTML
    echo "<h1>Contenu qui s'affiche sur la page HTML</h1>"; // Finir l'instruction par un ;
    echo '<h2>Même chose mais avec les guillemets simples (single quote)</h2>';

    /*
        Une variable c'est un mot clé qui permet de stocker des informations (des données)
        La variable peut stocker tout types de données
        En php on ne type pas les données
        C'est PHP lui même qui connait le type

        integer (entier)
        float (nombre décimal)
        string (chaine de caractère, contenu alphanumérique)
        boolean (booléen)

        Pour créer une variable, il ne faut pas oublier d'utiliser le signe $ devant le mot de la variable
        Une variable ne peut PAS contenir d'espaces ou de caractères spéciaux
        Une variable DOIT commencer par une lettre
        Une variable PEUT contenir des chiffres
        Une variable ne PEUT PAS contenir d'accents
        Une variable PEUT contenir des majuscules
        Une variable PEUT contenir des underscores _
        Une variable NE PEUT PAS contenir de tirets -

        VOUS choisissez le nom de votre variable
        idéalement il faut choisir un nom en anglais
        idéalement il faut choisir un nom qui est "parlant" par rapport au contenu stocké dans cette variable

        Dans le cas ou votre variable doit contenir plusieurs mots, vous pouvez au choix :
            - Utiliser le snake case, c'est à dire séparer chaque mot par un underscore _
            - Utiliser le camel case, c'est à dire séparer chaque mot par une Majuscule

        Choisissez une façon de nommer vos variables et tenez vous-y tout au long de votre programme

        Vous avez un logiciel "pseudo" intelligent.
        Le logiciel possède une fonction d'autocomplétion/auto suggestion

        Lorsque vous allez devoir utiliser une variable que vous avez déjà créée
        vous allez pouvoir commencer à écrire les premières lettres de la variable
        le programme vous suggère les lettres suivantes
    */

    $titrePrincipal = "<h1>Titre de la page</h1>"; // Camel case
    $titre_principal = "<h1>Titre de la page</h1>"; // Snake case

    $int = -15; // integer (entier)
    $float = -12.4; // float (nombre décimal)
    $string = "Ma chaîne de caractère"; // string (chaine de caractère, contenu alphanumérique)
    $bool = false;// boolean (booléen)

    /*
        Manipuler les variables : 
        Effectuer des opérations mathématiques

        Les opérateurs :
        +
        -
        /
        *
        % (modulo : reste d'une division)
        ^ (exposant, puissance) : 6^2
        ()

        Vous avez la possibilité d'utiliser le résultat de variables pour effectuer le calcul sur d'autres variables
    */
    $num1 = 10;
    $num2 = 20;

    $resultat = $num1 + 5 * $num2 + $num1 - 4;

    $autre_resultat = $resultat * $resultat;

    // echo $autre_resultat;
    echo "<p>Premier résultat $resultat et deuxième résultat : $autre_resultat €</p>";

    // Effectuer une concaténation
    echo "<p>Premier résultat $resultat et deuxième résultat : ".$autre_resultat."€</p>";

    // Concaténation : Ajouter quelque chose à quelque chose d'autre
    
    /*
        Les conditions :
            - Les if, elseif, else (si, sinon si, sinon)
            - Les switch (selon les cas)
            - Les ternaires : des conditions condensées en une ligne

        
        Les ternaires :
            - Un if/else sur une ligne, qui à pour but d'attribuer une valeur à une variable
            Une ternaire se faire donc directement sur une variable
            Egalement appelé "Condition condensée"

        Vous n'est pas obligé de réaliser UN SEUL test dans vos conditions
        Vous pouvez ajouter AUTANT de tests que nécessaire

        Les opérateurs de tests :
        Symbole         Signification
        ==              Egal à (bien faire attention à ne pas oublier le deuxième =)
        ===             Strictement égal à (test l'égalité et le type)
        !=              Différent de
        >               Strictement supérieur à
        >=              Supérieur ou égal à 
        <               Strictement Inférieur à
        <=              Inférieur ou égal à

        Les opérateurs logiques
        Mot clé         Equivalent          Signification
        AND             &&                  ET
        OR              || (alt gr + -6|)   OU

        Dans nos conditions on à le droit d'utiliser les parenthèses
        pour regrouper nos tests

        if( ($nb1 > $nb2 AND $nb1 > 6) || ($nb1 < 4 OR $nb2 === 18))

        if( ($nb1 > $nb2 AND $nb1 > 6) || $nb1 < 4)

        Pour effectuer les tests on doit utiliser la syntaxe suivante :

        if(conditions){
            // instructions
            // Autant qu'on le souhaite
        }

        Vous pouvez laisser un if simple, ou ajouter des elseif et else SI et seulement SI vous en avez besoin
    */
    $nb1 = 18;
    $nb2 = 12;

    if($nb1 > $nb2 AND $nb1 > 8){
        echo "<br/>Le nombre 1 est supérieur au nombre 2";
    } elseif($nb1 === $nb2) {
        echo "<br/>Le nombre 1 est strictement égal au nombre 2";
    } else {
        echo "<br/>Nous sommes dans un autre cas.";
    }

    // Les switch : un interrupteur à plusieurs état
    // le switch peut tester uniquement des cas précis
    // Le switch s'effectue sur une variable en particulier

    switch($nb1){
        case 6:
            echo "<br/>Le nombre 1 vaut 6";
        break;

        case "Administrator":
            echo "<br/>Le nombre 1 vaut Administrator";
        break;

        case true:
            echo "<br/>Le nombre 1 vaut le booléen TRUE";
        break;

        default:
            echo "<br/>On n'entre pas dans les conditions";
    }

    // Ternaires
    // $variable = (la/les condition.s) ? valeur si la condition est remplie : valeur si la condition n'est PAS remplie;
    $nb3 = 4;
    $nb4 = 6;

    $resultat = ($nb3 > $nb4) ? true : false;
    $resultat = ($nb3 > $nb4) ? $nb3 + $nb4 : 0;
    echo $resultat; // 0

?>