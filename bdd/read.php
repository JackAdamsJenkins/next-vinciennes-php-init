<?php 
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Afficher les utilisateurs</h1>
    <?php 
        // Si la variable get msg est transmise, on affiche un message de succes pour la suppression
        if(isset($_GET['msg']))
            echo "<h2>L'utilisateur a été supprimé</h2>";

        // Si on récupère la variabl err, ça signifie que l'utilisateur n'existe pas
        if(isset($_GET['err']))
            echo "<h2>L'utilisateur que vous essayez de modifier n'existe pas(plus) !</h2>";
    ?>
    <p><a href="create.php">Ajouter un utilisateur</a></p>
    <!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
    <table class="GeneratedTable">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Mail</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // Effectuer la requête à la base de données
            $sql = "SELECT prenom_user as prenom, nom_user as nom, mail_user as mail, id_user as id FROM user";
            $req = mysqli_query($bdd, $sql);

            while($data = mysqli_fetch_assoc($req)){
                echo '
                <tr>
                    <td>'.$data['prenom'].'</td>
                    <td>'.$data['nom'].'</td>
                    <td>'.$data['mail'].'</td>
                    <td><a href="update.php?id='.$data['id'].'">Modifier</a> | <a href="delete.php?id='.$data['id'].'">Supprimer</a></td>
                </tr>
                ';
            }
        ?>
    </tbody>
    </table>
</body>
</html>