<?php 
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Tableau de bord</h1>
    <h2>Liste des résidents</h2>
    <p><a href="addCustomer.php">Ajouter un résident</a></p>
    <ul>
    <?php 
        // $sql = "SELECT id_customer as id, nom_customer as nom, prenom_customer as prenom, nbresident_customer as nombre, dureeresidence_customer as duree FROM customer";

        $sql = "SELECT id_customer as id, nom_customer as nom, prenom_customer as prenom, nbresident_customer as nombre, dureeresidence_customer as duree, nom_location FROM customer LEFT JOIN location ON customer.id_location = location.id_location";
        $req = mysqli_query($bdd, $sql);

        while($data = mysqli_fetch_assoc($req)){
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $nombre = $data['nombre'];
            $duree = $data['duree'];
            $nomLocation = $data['nom_location'];
            $id = $data['id'];

            echo "<li>$nom $prenom - $nombre residents - $duree jours - $nomLocation <a href=\"updateCustomer.php?id=$id\">Modifier</a> | <a href=\"deleteCustomer.php?id=$id\">Supprimer</a></li>";
        }
    ?>
    </ul>

    <h2>Liste des locations</h2>
    <!-- Lister les résidences -->
    <ul>
    <?php 
        $sql = "SELECT id_location as id, nom_location as nom, adresse_location as adresse, lit_location as lit FROM location";
        $req = mysqli_query($bdd, $sql);

        while($data = mysqli_fetch_assoc($req)){
            $nom = $data['nom'];
            $adresse = $data['adresse'];
            $lit = $data['lit'];
            $id = $data['id'];
            echo "<li>$nom - $adresse - $lit lits disponibles <a href=\"updateLocation.php?id=$id\">Modifier</a></li>";
        }
    ?>
    </ul>
    <p><a href="addLocation.php">Ajouter une location</a></p>
</body>
</html>