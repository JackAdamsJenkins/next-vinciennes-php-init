<?php 
    $message = null;

    if(isset($_FILES['avatar'])){ 
        // Traitement de l'upload du fichier à l'envoi du formulaire
        $uploaddir = "./upload/";
        //          le nom du champ d'upload
        $uploadfile = $uploaddir . basename($_FILES['avatar']['name']); // image.png

        // 1ere solution : ajouter date et heure de l'upload devant ou derrière le nom du fichier : 06052022162324_image.png
        // 2e solution : générer un nombre aléatoire à coller devant ou derrière le nom du fichier : 125_image.png
        // 3e solution : effectuer un hashe du nom du fichier : md5($nomdufichier) > d2b5ca33bd970f64a6301fa75ae2eb22.png

        // limiter aux fichiers IMAGES (jpg, jpeg, png)
        $file_type = $_FILES['avatar']['type']; //returns the mimetype

        // ajouter le type mime des fichiers à uploader
        // https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        if(in_array($file_type, $allowed)) {
             // origine du fichier,       l'endroit ou envoyer le fichier
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
                // L'upload à fonctionné
                $message = '<img src="upload/'.$_FILES['avatar']['name'].'">';
            } else {
                // L'upload à échoué
                $message = "Impossible d'uploader le fichier";
            }
        } else {
            $message = "Vous devez choisir UNIQUEMENT des images.";
        }

       
    }
    
       
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de fichier avec PHP</title>
</head>
<body>
    <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
    <form enctype="multipart/form-data" action="#" method="post">
    <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
        Envoyez un avatar : <input name="avatar" type="file" />
        <input type="submit" value="Envoyer le fichier" />
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>