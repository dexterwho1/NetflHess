<?php
require_once "db.php";

$req= $bdd->prepare('select titre, synopsis, prix from film ORDER BY id DESC LIMIT 20'
);
$req->execute(
);

while($donnee = $req->fetch()){
    echo $donnee['titre'];
}
?>

