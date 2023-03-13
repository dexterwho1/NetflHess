<?php
require_once 'db.php';
print_r($_POST);

$req_id = $bdd->prepare('SELECT id from VOITURES');
$req_id->execute();

$lastdatas = NULL;
while($datas = $req_id->fetch()) {
    $lastdatas = $datas['id'];
}
echo $lastdatas;

$req_insert = $bdd->prepare('INSERT INTO voitures (descriptif, modele, prix, cylindre, motorisation, boite, id) 
VALUES (:descriptif, :modele, :prix, :cylindre, :motorisation, :boite, :id)');


$req_insert->execute([
    'descriptif' => $_POST['descriptif'],
    'modele' => $_POST['modele'],
    'prix' => $_POST['prix'],
    'cylindre' => $_POST['cylindre'],
    'motorisation' => $_POST['motorisation'],
    'boite' => $_POST['boite'],
    'id' => $lastdatas + 1,
]);
header('Location: car.php');


?>