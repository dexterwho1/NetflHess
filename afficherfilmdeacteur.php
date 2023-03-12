<?php
require_once "db.php";

$req = $bdd->prepare(
    'select titre from film where realisateur =:realisateur'
);
$req->execute(array('realisateur' =>$_GET['id']));
while($donnee =$req->fetch()){
    echo $donnee['titre'];
}



?>
