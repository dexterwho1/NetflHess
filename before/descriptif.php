<?php
require_once"db.php";

$id= $_GET['id'];
$req= $bdd->prepare('select * from voitures where id= :id');
$req->execute([
    'id' => $_GET['id']
]);
$row= $req->fetch();
echo $row['descriptif'];
echo $row['modele'];
echo $row['prix'];
echo $row['cylindre'];
echo $row['cylindre'];
echo $row['boite'];









?>