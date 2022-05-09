<?php 
// Créer un programme qui demande d’entrer un niveau de compte et qui affiche :
//      « Vous êtes Administrateur », si l’utilisateur entre « Administrateur »
//      « Vous êtes Modérateur », si l’utilisateur entre « Modérateur »
//      « Vous êtes Abonné », si l’utilisateur entre « Abonné »
//      « Vous n’êtes pas connecté », si l’utilisateur entre autre chose que les mots précisés plus
//     haut.

$message = null;

if(isset($_POST['level'])){
    $level = $_POST['level'];

    // switch($level){
    //     case "Administrateur":
    //         $message = "Vous êtes Administrateur";
    //     break;

    //     case "Modérateur":
    //         $message = "Vous êtes Modérateur";
    //     break;

    //     case "Abonné":
    //         $message = "Vous êtes Abonné";
    //     break;

    //     default: 
    //         $message = "Vous n'êtes pas connecté";
    // }

    // Autre solution
    if($level == "Administrateur" || $level == "Modérateur" || $level == "Abonné")
        $message = "Vous êtes $level";
    else 
        $message = "Vous n'êtes pas connecté";
    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP04 - Test niveau de compte</title>
</head>
<body>
    <h1>Avez-vous les autorisations nécessaires ?</h1>
    <form action="#" method="post">
        <input type="text" name="level" placeholder="Niveau de compte">
        <input type="submit" value="Vérifier le niveau">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>