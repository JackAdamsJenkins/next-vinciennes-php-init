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

// echo "Vous êtes connecté";

/*
    4 types de requêtes possibles
        - Ajouter des données
        - Lire des données
        - Modifier des données
        - Supprimer des données

    Système CRUD
        - Create (INSERT INTO)
        - Read (SELECT)
        - Update
        - Delete
*/

// Insérer des données (create)
/*
    INSERT INTO nom_de_la_TABLE(clé1, clé2, clé3) VALUES('Valeur 1', 'Valeur 2', 'Valeur 3')
*/
$message = null;
if(isset($_POST['prenom'])){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    // $sql = mysqli_prepare(baseDeDonnees, laReQuete);
    $prepare = mysqli_prepare($bdd, "INSERT INTO user(mail_user, nom_user, prenom_user) VALUES(?, ?, ?)");
    // mysqli_stmt_bind_param(requetePreparee, "type_de_donnee", donnee1, donnee2, donnee3);
            // Type : integer, string, decimal
            // On utilise UNIQUEMENT la première lettre
            // Si vous envoyez PLUSIEURS données (?, ?, ?)
                // Il faut préciser le type de CHACUNE des données
    // mysqli_stmt_bind_param($prepare, "sis");
    // mysqli_stmt_bind_param($prepare, "sss");
    mysqli_stmt_bind_param($prepare, "sss", $mail, $nom, $prenom);

    // Executer la requête préparée
    // mysqli_stmt_execute($prepare);
    if(!mysqli_stmt_execute($prepare))
        die('Erreur');
    
    $message = "Utilisateur ajouté à la base de données";
}

// Afficher les données qui se trouvent dans la base de données
// Sélectionne TOUTES(*) les données de ma table USER
$sql = "SELECT * FROM user";
// Sélectionne le prénom et le nom de TOUS les utilisateurs
$sql = "SELECT prenom_user, nom_user FROM user";

/*
    Je suis un utilisateur
    Je souhaite me connecter

    Je dois rentrer mon nom et mon mot de passe
    > Chercher dans la base de données l'utilisateur qui correspond avec mes informations

    > Techniquement, le système doit me renvoyer UN SEUL résultat au maximum
*/
$sql = "SELECT prenom_user, nom_user FROM user WHERE mail_user ='info@errantecreation.com'";

// Je souhaite afficher toutes les personnes qui s'appellent "Marianne" et qui sont inscrites sur mon site
$sql = "SELECT nom_user FROM user WHERE prenom_user='Marianne' AND date_naissance > '10/01/1990'";
// Si j'ai 6 utilisateurs avec le prénom Marianne, le système m'envoie les 6 résultats

// Lorsqu'on ajoute une donnée à la base de données > Le système renvoi automatiquement un ID
$sql = "SELECT * FROM user WHERE id=1";

/*  
    Je possède un blog, qui contient un certain nombre d'articles
    Sur ma page d'accueil, je veux afficher les 6 derniers articles(descendant) dans la catégorie "tutos"

    TABLE : article
    Champs : 
        - id_article
        - titre_article
        - contenu_article
        - extrait_article
        - date_article
        - categorie_article

    Pour organiser par ordre : ORDER BY <champ> DESC|ASC
*/
$sql = "SELECT titre_article, extrait_article, date_article FROM article WHERE categorie_article='tutos' LIMIT 6";

$sql = "SELECT titre_article, extrait_article, date_article FROM article WHERE categorie_article='tutos' ORDER BY id DESC LIMIT 6";



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
    <form action="#" method="post">
        <input type="text" name="prenom" placeholder="Votre prénom">
        <input type="text" name="nom" placeholder="Votre nom">
        <input type="email" name="mail" placeholder="Votre Email">
        <input type="submit" value="Ajouter l'utilisateur">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>