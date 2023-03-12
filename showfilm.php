<?php
require_once "db.php";

$req= $bdd->prepare('select titre, synopsis, prix from film where type_film=0'
);
$req->execute(
);

while($donnee = $req->fetch()){
    echo $donnee['titre'];
}
?>

