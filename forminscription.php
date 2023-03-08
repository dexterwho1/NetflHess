<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["lastname"];
    $prenom = $_POST["firstname"];
    $email = $_POST["email"];
    $motdepasse = $_POST["password"];
    $adressefacture = $_POST["facturation"];
    $adresselivraison = $_POST["livraison"];
    $telephone = $_POST["phone"];
    $paypal = isset($_POST["checkout"]) && $_POST["checkout"] == "Paypal";
    $mastercard = isset($_POST["checkout"]) && $_POST["checkout"] == "Master Card";
    $contactezmoi = isset($_POST["contactme"]);


    // Afficher les valeurs du formulaire
    echo "Nom : " . $nom . "<br>";
    echo "Prénom : " . $prenom . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Mot de passe : " . $motdepasse . "<br>";
    echo "Adresse de facturation : " . $adressefacture . "<br>";
    echo "Adresse de livraison : " . $adresselivraison . "<br>";
    echo "Téléphone : " . $telephone . "<br>";
    echo "Paiement par Paypal : " . ($paypal ? "Oui" : "Non") . "<br>";
    echo "Paiement par Master Card : " . ($mastercard ? "Oui" : "Non") . "<br>";
    echo "Contactez-moi : " . ($contactezmoi ? "Oui" : "Non") . "<br>";

    $req = $bdd->prepare('INSERT INTO utilisateur(nom,prenom,email,motdepasse,adressefacture,adresselivraison,telephone,paypal,mastercard,contactezmoi)
        VALUES(:nom,:prenom,:email,:motdepasse,:adressefacture,:adresselivraison,:telephone,:paypal,:mastercard,:contactezmoi)');
    $req->execute(array(
        ':nom'=> $nom,
        ':prenom'=> $prenom,
        ':email'=>$email,
        ':motdepasse'=>$motdepasse,
        ':adressefacture'=>$adressefacture,
        ':adresselivraison'=>$adresselivraison,
        ':telephone'=>$telephone,
        ':paypal'=>$paypal,
        ':mastercard'=>$mastercard,
        ':contactezmoi'=>$contactezmoi
    ));
    header('Location: inscription.php');


}
?>