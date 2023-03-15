<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["lastname"];

    if (!preg_match('/^[a-zA-Z,-]{2,25}$/', $nom)) {
        $_SESSION['notification']="Le nom de famille doit contenir que des lettres entre 2 et 25";
        header('location: inscription.php');

        exit();

    }






    $prenom = $_POST["firstname"];
    if (!preg_match('/^[a-zA-Z,-]{2,25}$/', $prenom)) {
        $_SESSION['notification']="Le prénom doit contenir que des lettres entre 2 et 25";
        header('location: inscription.php');

        exit();


    }


    $email = $_POST["email"];

    if (strlen($email) < 5 and strlen($email) > 30) {
        $_SESSION['notification']= "L'adresse e-mail doit contenir entre 5 et 30 caractères.";
        header('location: inscription.php');
        exit();

    }

    if (substr_count($email, "@") !== 1) {
        $_SESSION['notification']= "L'adresse e-mail doit contenir un seul symbole @.";
        header('location: inscription.php');

        exit();

    }


// Vérification de la présence de caractères valides
    if (!preg_match('/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $email)) {
        $_SESSION['notification']= "L'adresse e-mail ne doit contenir que des lettres, des chiffres, des points et des tirets.";
        header('location: inscription.php');

        exit();

    }
// Vérification de l'absence d'espaces
    if (strpos($email, " ") !== false) {
        $_SESSION['notification']= "L'adresse e-mail ne doit pas contenir d'espaces.";
        header('location: inscription.php');

        exit();

    }

    $verif =false;
// Vérification de l'absence de l'adresse e-mail dans la liste existante
    $req = $bdd->prepare('SELECT email FROM utilisateur');
    $req->execute();
    $verif = false;
    while ($donnee = $req->fetch()) {
        if ($donnee['email'] == $email) {
            $verif = true;
        }
    }

    if ($verif == true) {
        $_SESSION['notification'] = "Email déjà utilisé.";
        header('location: inscription.php');

        exit();

    }




    $motdepasse = $_POST["password"];


// Vérification de la longueur du mot de passe
    if (strlen($motdepasse) < 8 || strlen($motdepasse) > 25) {
        $_SESSION['notification']= "Le mot de passe doit contenir entre 8 et 25 caractères.";
        header('location: inscription.php');
        exit();

    }

// Vérification de la présence d'au moins une lettre majuscule
    if (!preg_match('/[A-Z]/', $motdepasse)) {
        $_SESSION['notification']= "Le mot de passe doit contenir au moins une lettre majuscule.";
        header('location: inscription.php');

        exit();

    }

// Vérification de la présence d'au moins une lettre minuscule
    if (!preg_match('/[a-z]/', $motdepasse)) {
        $_SESSION['notification']= "Le mot de passe doit contenir au moins une lettre minuscule.";
        header('location: inscription.php');

        exit();

    }

// Vérification de la présence d'au moins un chiffre
    if (!preg_match('/[0-9]/', $motdepasse)) {
        $_SESSION['notification']= "Le mot de passe doit contenir au moins un chiffre.";
        header('location: inscription.php');

        exit();

    }





    $adressefacture = $_POST["facturation"];
    if (strlen($adressefacture) < 8) {
        $_SESSION['notification']= "L'adresse doit contenir au moins 8 lettres.";
        header('location: inscription.php');
        exit();

    }

// Vérification de la présence d'au moins deux espaces
    if (substr_count($adressefacture, ' ') < 2) {
        $_SESSION['notification']= "L'adresse doit contenir au moins deux espaces.";
        header('location: inscription.php');
        exit();

    }

// Vérification des caractères spéciaux
    if (!preg_match('/^[a-zA-Z0-9\s\'-]+$/', $adressefacture)) {
        $_SESSION['notification']= "L'adresse ne doit pas contenir de caractères spéciaux sauf les apostrophes et les tirets.";
        header('location: inscription.php');
        exit();

    }

    $adresselivraison = $_POST["livraison"];
    if (strlen($adresselivraison) < 8) {
        $_SESSION['notification']= "L'adresse doit contenir au moins 8 lettres.";
        header('location: inscription.php');

        exit();

    }


// Vérification de la présence d'au moins deux espaces
    if (substr_count($adresselivraison, ' ') < 2) {
        $_SESSION['notification']= "L'adresse doit contenir au moins deux espaces.";
        header('location: inscription.php');

        exit();

    }

// Vérification des caractères spéciaux
    if (!preg_match('/^[a-zA-Z0-9\s\'-]+$/', $adresselivraison)) {
        $_SESSION['notification']= "L'adresse ne doit pas contenir de caractères spéciaux sauf les apostrophes et les tirets.";
        header('location: inscription.php');
        exit();

    }


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

    if (strlen($telephone) < 10 || strlen($telephone) > 15) {
        $_SESSION['notification']= "Le numéro de téléphone doit contenir entre 10 et 15 chiffres.";
        header('location: inscription.php');

        exit();

    }

// Vérification de l'absence de lettres dans le numéro de téléphone
    if (preg_match('/[a-zA-Z]/', $telephone)) {
        $_SESSION['notification']= "Le numéro de téléphone ne doit pas contenir de lettres.";
        header('location: inscription.php');
        exit();

    }

// Vérification de la présence d'un "+" à la première lettre
    if (substr($telephone, 0, 1) != "+") {
        $_SESSION['notification']= "Le numéro de téléphone doit commencer par un signe plus (+).";
        header('location: inscription.php');
        exit();

    }

    $motdepasse=password_hash($motdepasse, PASSWORD_DEFAULT);

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
    $_SESSION['success']= "Votre compte à bien été créer";
    header('Location: homepage.php');

}
?>
