<?php
require_once "db.php";
session_start();

if (isset($_GET['id'])) {
    $req = $bdd->prepare('DELETE FROM panier WHERE id_utilisateur = :id_utilisateur AND id_film = :id_film');
    $req->execute(array(
        ':id_utilisateur' => $_SESSION['email'],
        ':id_film' => $_GET['id']
    ));
    $req->closeCursor();
}

header('location: panier.php');
exit();
?>
