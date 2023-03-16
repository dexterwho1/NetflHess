<?php
require_once "db.php";
session_start();
$tableau = [];
$id_utilisateur = htmlspecialchars($_SESSION['email']);

$req = $bdd->prepare('SELECT id_film FROM panier WHERE id_utilisateur = :utilisateur');
$req->execute(array(
    ':utilisateur' => $id_utilisateur,
));

while ($donnee = $req->fetch()) {
    $tableau[] = $donnee['id_film'];
}

if (count($tableau) == 0) {
    echo "Panier vide";
} else {
    $insert = $bdd->prepare("INSERT INTO liste (id_film, id_utilisateur) VALUES (:id_film, :id_utilisateur)");
    foreach ($tableau as $id_film) {
        $insert->execute(array(
            ':id_film' => $id_film,
            ':id_utilisateur' => $id_utilisateur
        ));
    }
    $suppr = $bdd->prepare('DELETE FROM panier WHERE id_utilisateur = :utilisateur');
    $suppr->execute(array(
        ':utilisateur' => $id_utilisateur
    ));
    header('Location:homepage.php');


}

exit();
?>
