<?php 
    // Si on a un id de transmis
    if(isset($_GET['id']) && !empty($_GET['id'])){
        require_once('connect.php');
        $sql = "DELETE FROM customer WHERE id_customer = ?";
        $prepare = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($prepare, "i", $_GET['id']);

        if(mysqli_stmt_execute($prepare))
            header('location: dashboard.php');
    } else {
        // Pas de données, on renvoi vers la page dashboard
        header('location: dashboard.php');
    }
?>