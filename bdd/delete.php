<?php 
    require_once('connect.php');

    // Est-ce que l'utilisateur a transmis un id ?
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM user WHERE id_user=?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "i", $id);

        // Si tout va bien, on REDIRIGE vers la page de lecture
        // Avec un message supplémentaire
        if(mysqli_stmt_execute($prepare))
            header('location: read.php?msg=ok');
    }
?>