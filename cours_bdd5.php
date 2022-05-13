<?php 
// Connexion à la base de données
$server = "localhost";
$username = "usernext";
$password = "123456";
$dbname = "nextformation";

// Connexion à la base de données
// $bdd = mysqli_connect("serveur", "nom d'utilisateur", "mot de passe", "nom de la base de données"); 
$bdd = mysqli_connect($server, $username, $password, $dbname);

// Tester si la connexion est effective
if(!$bdd)
    die("Vous n'êtes pas connecté");

$message = null;
// On traite la modification (update) de données lors de l'envoi du formulaire POST
if(isset($_POST['prenom']) && isset($_GET['id'])){
    // Récupérer les informations du formulaire et de l'id
    $id = $_GET['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];

    // Préparer la requête de mise à jour
    // UPDATE nomDeLaTable SET champAModifier = NouvelleValeur, AutreChamp = AutreValeur WHERE idAModifer = idRécupérée
    $sql = "UPDATE user SET prenom_user=?, nom_user=?, mail_user=? WHERE id_user=?";
    $prepare = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($prepare, "sssi", $prenom, $nom, $mail, $id);

    // Executer la requête de mise à jour
    if(mysqli_stmt_execute($prepare))
        $message = "Utilisateur mis à jour.";
}


// Afficher les données qui se trouvent dans la base de données
// Sélectionne TOUTES(*) les données de ma table USER
$sql = "SELECT * FROM user ORDER BY id_user DESC";
// Execution de la requête SQL
$req = mysqli_query($bdd, $sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données</title>
</head>
<body>
    <p><?php echo $message; ?></p>
    <h1>Lecture de données</h1>
    <?php 
        while($data = mysqli_fetch_row($req)){
            echo '<p>Votre id est '.$data[0].', votre prénom est '.$data[1].' <a href="?id='.$data[0].'">Modifier</a></p>';
        }
    ?>
    
    <h2>Modification de données</h2>
    <?php 
        // Récupérer les données par rapport à un ID
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Faire appel à la base de données pour voir s'il existe une ligne correspondante à cette ID
            $sql = "SELECT prenom_user as prenom, nom_user as nom, mail_user as mail FROM user WHERE id_user=?";
            $prepare = mysqli_prepare($bdd, $sql);
            mysqli_stmt_bind_param($prepare, "i", $id);
            mysqli_stmt_execute($prepare);

            // On stock le résultat dans la mémoire tampon
            mysqli_stmt_store_result($prepare);

            // On vérifie si il existe 1 résultat, s'il existe 0 résultat > ca veut dire que la ligne n'existe PAS
            if(mysqli_stmt_num_rows($prepare) == 1){
                // On va pouvoir faire la requête pour récupérer les données de la base de données
                // par rapport à cette ligne UNIQUEMENT
                mysqli_stmt_execute($prepare);

                // Affiche les données de la requête
                $getResult = mysqli_stmt_get_result($prepare);
                while($data = mysqli_fetch_assoc($getResult)){ ?>
                    <form action="#" method="post">
                        <input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $data['prenom']; ?>">
                        <input type="text" name="nom" placeholder="Votre nom" value="<?php echo $data['nom']; ?>">
                        <input type="email" name="mail" placeholder="Votre email" value="<?php echo $data['mail']; ?>">
                        <input type="submit" value="Mettre à jour">
                    </form>
               <?php }
            } else {
                die("L'utilisateur que vous souhaitez afficher n'existe pas");
            }
        }
        
    ?>
    
</body>
</html>