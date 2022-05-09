<?php 
    // Traitement de l'upload avec PHP
    /*
        Pour récupérer les données en méthode :
            - post > $_POST['nomDeLaDonnee']
            - get > $_GET['nomDeLaDonnee']
        Par contre, point particulier, lorsqu'on fait de l'upload, si on souhaite récupérer les fichiers
        on doit utiliser :
            - $_FILES['nomDeLaDonnee']
    */
    $message = null;
    // On test si le formulaire a été envoyé
    if(isset($_FILES['image'])){
        // On peut commencer le traitement de l'upload

        // On indique dans quel dossier on souhaite uploader les fichiers
        $dirFile = './upload/';

        // On indique sous quel NOM on va stocker l'image
        $fileUpload = $dirFile . basename($_FILES['image']['name']);

        // 1ere possibilité : on restreint l'upload à certains types de fichier
        // 2e possibilité : on accèpte TOUS type de fichier

        // 1ere possibilité :
                            // origine du fichier,          l'endroit ou envoyer le fichier
                            // dans un dossier temporaire
        // if(move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)){
        //     // L'upload a réussi
        //     $message = "Le fichier a été uploadé correctement.";
        // } else {
        //     // L'upload a échoué
        //     $message = "Quelque chose s'est mal passé pendant l'upload.";
        // }

        // 2e possibilité :
        // Récupérer le type mime du fichier
        $typeMime = $_FILES['image']['type'];

        // Limiter l'upload à certains type mime (création de la liste de limite)
        // https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
        $allowed = array('image/jpeg', 'image/png', 'image/gif');

        // Est-ce que le type mime du fichier uploadé EST dans la liste des fichiers autorisé ?
        if(in_array($typeMime, $allowed)){
            // faire l'upload
            if(move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)){
                // L'upload a réussi
                $message = "Le fichier a été uploadé correctement.";
            } else {
                // L'upload a échoué
                $message = "Quelque chose s'est mal passé pendant l'upload.";
            }
        } else {
            $message = "Vous devez choisir un fichier image.";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un fichier sur le serveur</title>
</head>
<body>
    <!-- Pour l'upload de fichier il faut obligatoirement passer par la médhode POST -->
    <!-- Il faut également indiquer le type d'encodage -->
    <form action="#" method="post" enctype="multipart/form-data">
        <!-- Il faut un champ d'upload (type : file) -->
        <input type="file" name="image">
        <input type="submit" value="Uploader !">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>