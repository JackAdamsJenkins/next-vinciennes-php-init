<?php 

// Commentaire sur une seule ligne
// Un autre commentaire
# Commentaire sur une seule ligne

/*
    Ceci est un
    commentaire sur 
    plusieurs lignes
    ...
    ...
*/

// Raccourci clavier pour commenter : ctrl + slash (:/)

// Fonction qui permet d'afficher du contenu sur votre page
echo "<h1>Le contenu à afficher sur la page</h1>";
echo '<h2>Autre contenu à afficher</h2>'; // Ne pas oublier le ; à la fin d'une instruction
echo "<p>La date d'aujourd'hui est ...</p>";
echo '<p>La date d\'aujourd\'hui est ...</p>'; // Echapper les caractères avec un antislash \ devant

echo "Premier contenu à afficher <br/>";
echo "Deuxième contenu à afficher<br/>";

/*
    Une variable, c'est un mot clé qui permet de stocker des données(informations)
    En php on ne type pas une variable

    En php, pour écrire une variable, on doit utiliser le signe $ avant le nom de la variable

    Une variable doit s'écrire en UN SEUL MOT (tout attaché)
    Une variable ne doit PAS contenir de caractères spéciaux (,?;:éà@)
    Le nom d'une variable PEUT contenir des chiffres
    Le nom d'une variable ne peut PAS commencer par un chiffre

    Dans le cas ou votre variable doit contenir plusieurs mots, vous avez deux possibilités d'écriture :
    - Soit vous séparez les mots par un underscore _ (snake case)
    - Soit vous utilisez le camel case :
        - La première lettre du premier mot en minuscule
        - La premier lettre de chaque mot suivants en majuscule

    ATTENTION : Les majuscules et minuscules sont IMPORTANTES dans le nom de vos variables :
        - $maVariable sera différente de $mavariable
    
    IMPORTANT : Respecter dans tout votre programme votre choix d'écriture de variables

    Idéalement, les noms de vos variables doivent être en anglais.
*/
$number = 15; // integer (nombre entier)
$numFloat = 13.9; // float (nombre à virgule flotante)
$myStringIsANumber = "Chaîne de caractère"; // string (contenu alphanumérique)
$my_string_is_a_number = "Chaîne de caractère"; // string (contenu alphanumérique)
$bool = true; // boolean
$bool = false; // boolean
$bool = 1; // boolean
$bool = 0; // boolean

// Concaténation = ajouter quelque chose à quelque chose d'autre (dans le sens coller pas dans le sens addition)
/*
    Faire une concaténation :
        - On utilise le . après être sorti de la chaine de caractère (après les " ou ')
        - Entre la variable et la chaine de caractère il faut un .
*/
// echo "La variable number vaut : ".$number;
// echo $number." La variable number vaut : ";
// echo "Ma chaine de caractère ".$number." avec la variable au milieu";

/*
    Vous pouvez faire une concaténation sans avoir besoin d'utiliser le .
    Pour cela, il faut simplement utiliser les guillemets doubles "

    Les variables qui sont affichées dans les guillemets doubles seront comprises par le programme
*/
// echo "La variable number vaut : $number";
// echo 'La variable number vaut : $number'; // Variable NON interprêtée


/*
    Une variable booléenne, c'est une variable qui ne peut prendre que deux états :
    - true(vrai) ou false(faux)
    - 1          ou 0
*/

$number = 18;
echo "La variable number vaut : $number";

// On a le droit d'attribuer la valeur d'une variable à une autre variable
$num1 = 10;
$num2 = 20;

$num3 = $num1;

echo "<br/>Valeur de num3 : $num3";

/*
    Petit exercice : 
        - Vous allez créer 2 variables (valA et valB)
        - Vous allez attribuer une valeur différente à chaque variable

        - Le but du jeu est de réussir à INVERSER le contenu de chaque variable et des les afficher
        SANS TRICHER
*/
$valA = 10;
$valB = 20;

echo "<br/>La variable A vaut $valA et la variable B vaut $valB";

$valTemp = $valA; // 10
$valA = $valB; // 20
$valB = $valTemp; // 10

echo "<br/>La variable A vaut $valA et la variable B vaut $valB";

// Même exercice, mais avec des verres
$verre1 = "Toto";
$verre2 = "Tata";

// Faire en sorte que le verre1 contienne de la grenadine et le verre2 du coca
$verre3 = $verre1; // Toto
$verre1 = $verre2; // Tata
$verre2 = $verre3; // Toto

/*
    Manipuler les variables
    Effectuer des opérations mathématiques
*/
/*
    Les opérateurs :
    +
    -
    /
    *
    % (modulo, le reste d'une division)
    ^ (exposant, puissance) 6^2
    ( )
*/

$num1 = 10;
$num2 = 8;

// $calcul = 10 + 8 - 4 * 9 +  (5 - 3) * 3;
// $calcul = $num1 * $num1;
$calcul = $num1 + $num2;


echo "<br/>Voici le résultat du calcul : $calcul";

/*
    Les conditions :
        - Les if, elseif, else (si, sinon si, sinon)
        - Les switch (selon les cas)
        - Les ternaires : des conditions condensées sur une seule ligne

    
    Les opérateurs de tests :
    Symbole         Signification
    ==              Egal à (bien faire attention à ne PAS oublier le deuxième =)
    ===             Strictement égal à (test l'égalité et le type)
    !=              Différent de
    >               Strictement supérieur à
    >=              Supérieur ou égal à (bien faire attention à l'ordre) : => ce n'est PAS correct
    <               Strictement inférieur à
    <=              Inférieur ou égal à

    Mot clé         Equivalent      Signification
    AND             &&              ET
    OR              ||              OU

    Dans nos conditions nous avons le droit d'utiliser les parenthèses
*/

$maVariable = 10; // integer
$maDeuxiemeVariable = "10"; // string
$numeric = 20;

// si ma variable numérique est égale à 8
// if($numeric == 8 AND $numeric > 15 OR $numeric == 20){
//     // Autant d'instructions que
//     // Je le souhaite
//     echo "<br/> La valeur de numéric est $numeric";
// }

// if($numeric == 8){
//     echo "<br/>La valeur de numéric est 8";
// } else { // Une condition qui s'exécute SI et seulement SI le if ne s'execute pas
//     echo "<br/>On entre dans le else";
// }

// Petite particularité du else : elle s'execute dans TOUS LES AUTRES CAS qui ne sont pas pris en compte avant
// Le else ne prend pas d'argument : il n'y a pas de parenthèse

if($numeric == 8){
    echo "<br/>La valeur de numéric est 8";
} elseif($numeric == 20){
    echo "<br/>La valeur de numéric est 20";
} elseif($numeric > 15){
    echo "<br/>La valeur de numéric est 30";
} else { // Une condition qui s'exécute SI et seulement SI le if ne s'execute pas
    echo "<br/>On entre dans le else";
}

/*
    A partir du moment ou le programme rencontre une condition VRAIE
    il va zapper les conditions suivantes dans le même bloc de condition
*/


/*
    Exercice :
        - Créez une variable appellée : compte
        - La variable va pouvoir prendre différentes valeurs :
            - Abonné
            - Membre
            - Administrateur
            - Modérateur

        - Pour l'exercice, choisissez UNE des valeurs ci-dessus, et ettribuez là a la variable

        - Effectuez les conditions if/elseif/else nécessaires pour afficher (echo) ceci à l'écran :
            - "Vous êtes un abonné" Si la variable est définie à "Abonné"
            - "Vous êtes un membre" Si la variable est définie à "Membre"
            - "Vous êtes l'administrateur" Si la variable est définie à "Administrateur
            - "Vous êtes modo" Si la variable est définie à "Modérateur"
*/
$compte = "Abonné";

$menu = "";

if($compte == "Abonné"){
    echo "<br/>Vous êtes un abonné";

    $menu = "<ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Déconnexion</a></li>
            </ul>";
} elseif($compte == "Membre"){
    echo "<br/>Vous êtes un membre";
    $menu = "<ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Liste des membres</a></li>
                <li><a href=\"#\">Déconnexion</a></li>
            </ul>";
} elseif($compte == "Administrateur"){
    echo "<br/>Vous êtes l'administrateur";
    $menu = "<ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Liste des membres</a></li>
                <li><a href=\"#\">Ajouter un membre</a></li>
                <li><a href=\"#\">Déconnexion</a></li>
            </ul>";
} elseif($compte == "Modérateur"){
    echo "<br/>Vous êtes modo";
    $menu = "<ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Liste des membres</a></li>
                <li><a href=\"#\">Supprimer un membre</a></li>
                <li><a href=\"#\">Déconnexion</a></li>
            </ul>";
} else {
    echo "<br/>Vous n'êtes pas dans le système de compte";
}

echo $menu;


if($compte == "Administrateur"){
    if($nom == "Toto"){
        if($heure == "Matin"){
            echo "Bonjour Toto";
        } elseif($heure == "Soir"){
            echo "Bonsoir Toto";
        }    
    } else {
        echo "Autre chose";
    }
}

/*
    if(condition.s) {
        // Instructions
        // Autant qu'on le souhaite
    }

    On PEUX, mais on n'est PAS obligé, si on le souhaite, ajouter elseif et else

    if(condition.s){
        // Instructions
    } elseif(autre condition){
        // Instruction
    }

    if(condition.s){
        // instruction
    } else {
        // instruction
    }

    if(condition.s){
        // instruction
    } elseif(condition){
        // instruction
    } elseif(condition){
        // instruction
    } else {
        // instruction
    }

*/

/*
    Le switch :
        - Permet d'effectuer des conditions par rapport à la valeur d'UNE variable
        - On peux tester si une variable est égale à telle ou telle ou telle...valeur

    Ecrire un switch : 

        switch(variable a tester){
            case "Valeur de la variable":
                // Instruction
                // Autant qu'on le souhaite
            break;

            case "Valeur de la variable":
                // Instruction
                // Autant qu'on le souhaite
            break;

            case "Valeur de la variable":
                // Instruction
                // Autant qu'on le souhaite
            break;

            default:
                // Instruction si on n'entre dans aucun des cas au dessus
                // Le défaut n'a PAS BESOIN de break;
        }
*/
$compte = "Abonné";

switch($compte){
    case "Abonné":
        echo "<br/>Vous êtes un abonné";
    break;

    case "Membre":
        echo "<br/>Vous êtes un membre";
    break;

    case "Modérateur":
        echo "<br/>Vous êtes modo";
    break;

    case "Administrateur":
        echo "<br/>Vous êtes administrateur";
    break;

    default:
        echo "<br/>Vous n'êtes pas dans le système de compte";
}

$level = 4;

switch($level){
    case 1: 
        echo "<br/>Vous êtes level 1";
    break;

    case 2:
        echo "<br/>Vous êtes level 2";
    break;
}

$isAdmin = true;

switch($isAdmin){
    case true:
        echo "<br/>Vous êtes administrateur";
    break;

    case false:
        echo "<br/>Vous n'êtes PAS administrateur";
    break;

    default:
        echo "<br/>Valeur inconnue.";
}

$game = "The game is on";

// switch($game){
//     case "Are you okay?": 
//         echo...
// }

// Ternaires
// Conditions if else condensée sur une seule ligne qui à pour but d'attribuer une valeur à une variable
// variable = (condition) ? valeur si condition remplie : valeur si condition PAS remplie
$nb3 = 4;
$nb4 = 6;

// Ternaire
$plusGrand = ($nb3 < $nb4) ? "Oui" : "Non";

if($nb3 < $nb4){
    $plusGrand = "Oui";
} else {
    $plusGrand = "Non";
}

echo "Plus grand ou pas ? $plusGrand";

?>