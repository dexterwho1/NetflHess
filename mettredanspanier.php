<?php
require_once "db.php";
session_start();
echo $_GET['idfilm'];
if (!isset($_SESSION['email'])) {
    // utilisateur non connecté, redirection vers la page de connexion
    header('Location: connexion.php');
    exit();
}

if (!isset($_GET['idfilm'])) {
    echo "L'identifiant de film est manquant.";
    exit();
}

$id_film = htmlspecialchars($_GET['idfilm']);
$id_utilisateur = htmlspecialchars($_SESSION['email']);

$req = $bdd->prepare('INSERT INTO panier(id_utilisateur, id_film) VALUES (:id_utilisateur, :id_film)');
$req->execute(array(
    ':id_utilisateur' => $id_utilisateur,
    ':id_film' => $id_film
));
header('Location: homepage.php');
exit();
?>
