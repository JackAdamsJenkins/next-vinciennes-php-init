<?php 
/*
    Vous allez créer un système type CRUD pour une gestion de ToDo List

    le système devra vous permettre :
        - D'ajouter une nouvelle tache à la liste
        - De supprimer une tache
        - De mettre à jour (modifier) une tache
*/
    require_once('connect.php');
    $message2 = null;
    if(isset($_GET['id']) && isset($_GET['action']) && !empty($_GET['id'])){
        // Je check l'action souhaitée
        if($_GET['action'] == "supprimer"){
            // On effectue la suppression
            $sql = "DELETE FROM todo WHERE id_todo = ?";
            $prepare = mysqli_prepare($bdd, $sql);
            mysqli_stmt_bind_param($prepare, "i", $_GET['id']);
            if(mysqli_stmt_execute($prepare)){
                // La suppression a fonctionné
                $message2 = '<span style="color:green;">Element supprimé de la liste</span>';
            } else {
                // La suppression a échouée
                $message2 = '<span style="color:green;">Il y a eu un problème lors de la suppression de l\'élément de liste.</span>';
            }
        }

        if($_GET['action'] == "modifier"){
            if(isset($_POST['update']) && !empty($_POST['element'])){
                $sql = "UPDATE todo SET element_todo = ? WHERE id_todo = ?";
                $prepare = mysqli_prepare($bdd, $sql);
                mysqli_stmt_bind_param($prepare, "si", $_POST['element'], $_GET['id']);
                if(mysqli_stmt_execute($prepare)){
                    // La suppression a fonctionné
                    $message2 = '<span style="color:green;">Element de la liste modifié</span>';
                } else {
                    // La suppression a échouée
                    $message2 = '<span style="color:green;">Il y a eu un problème lors de la modification de l\'élément de liste.</span>';
                }
            }
        }
    }

    // 1. Je créé ma table dans ma base de données
        // Table : todo
        // field : id_todo(int)
        // field : element_todo(varchar)

    // 2. Créer le formulaire

    // 3. Capture de l'envoi du formulaire

    // 4. On fait l'affichage des données de la liste

    // 5. Suppression de données

    // 6. Modification de données

    // 7. Mise à jour des données
    $message = null;
    if(isset($_POST['submit']) && !empty($_POST['element'])){
        // On s'en fou si l'utilisateur ajoute plusieurs fois le même élément

        // On fait simplement l'ajout d'un nouvel élément
        $el = $_POST['element'];
        $sql = "INSERT INTO todo(element_todo) VALUES(?)";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "s", $el);

        if(mysqli_stmt_execute($prepare)){
            $message = '<span style="color:green;">Element ajouté à la liste</span>';
        } else {
            $message = '<span style="color:red;">Erreur lors de l\'ajout à la liste</span>';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>
<body>
    <h1>Ajouter un élément dans la liste</h1>
    <form action="#" method="post">
        <input type="text" name="element" placeholder="Ajouter un élément">
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <p><?php echo $message; ?></p>
    <h2>Votre ToDo Liste :</h2>
    <p><?php echo $message2; ?></p>
    <ul>
    <?php 
        // Requête pour afficher TOUS les éléments de la liste
        $sql = "SELECT id_todo as id, element_todo as el FROM todo ORDER BY id_todo DESC";
        $getResult = mysqli_query($bdd,$sql);

        // Afficher les données
        while($data = mysqli_fetch_assoc($getResult)){
            $id = $data['id'];
            $el = $data['el'];
            echo '<li>'.$el.' <a href="?id='.$id.'&action=modifier">Modifier</a> | <a href="?id='.$id.'&action=supprimer">Supprimer</a></li>';
        }
    ?>
    </ul>

    <?php 
        // Si dans la barre d'adresse j'ai le paramètre "action" à "modifier"
        // j'affiche le formulaire
        if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id']) && !empty($_GET['id'])){
            // Récupérer la donnée de la base de donnée grâce à l'id
            $sql = "SELECT element_todo FROM todo WHERE id_todo=?";
            $prepare = mysqli_prepare($bdd, $sql);
            mysqli_stmt_bind_param($prepare, "i", $_GET['id']);
            mysqli_stmt_execute($prepare);
            
            $getResult = mysqli_stmt_get_result($prepare);
            while($data = mysqli_fetch_assoc($getResult)){
                $element = $data['element_todo'];
            }
    ?>
        <h2>Modifier un élément</h2>
        <form action="#" method="post">
            <input type="text" name="element" placeholder="Ajouter un élément" value="<?php echo $element; ?>">
            <input type="submit" name="update" value="Mettre à jour">
        </form>
    <?php } ?>
</body>
</html>