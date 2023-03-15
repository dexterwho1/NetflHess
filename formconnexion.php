<?php
require_once "db.php";
session_start();

$email = $_POST['email'];
if (strlen($email) < 5 and strlen($email) > 30) {
    $_SESSION['notification']= "L'adresse e-mail doit contenir entre 5 et 30 caractères.";
    header('location: connexion.php');
    exit();

}

if (substr_count($email, "@") !== 1) {
    $_SESSION['notification']= "L'adresse e-mail doit contenir un seul symbole @.";
    header('location: connexion.php');

    exit();

}


// Vérification de la présence de caractères valides
if (!preg_match('/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $email)) {
    $_SESSION['notification']= "L'adresse e-mail ne doit contenir que des lettres, des chiffres, des points et des tirets.";
    header('location: connexion.php');

    exit();

}
// Vérification de l'absence d'espaces
if (strpos($email, " ") !== false) {
    $_SESSION['notification']= "L'adresse e-mail ne doit pas contenir d'espaces.";
    header('location: connexion.php');

    exit();

}

$motdepasse=$_POST['password'];


if (strlen($motdepasse) < 8 || strlen($motdepasse) > 25) {
    $_SESSION['notification']= "Le mot de passe doit contenir entre 8 et 25 caractères.";
    header('location: connexion.php');
    exit();

}

// Vérification de la présence d'au moins une lettre majuscule
if (!preg_match('/[A-Z]/', $motdepasse)) {
    $_SESSION['notification']= "Le mot de passe doit contenir au moins une lettre majuscule.";
    header('location: connexion.php');

    exit();

}

// Vérification de la présence d'au moins une lettre minuscule
if (!preg_match('/[a-z]/', $motdepasse)) {
    $_SESSION['notification']= "Le mot de passe doit contenir au moins une lettre minuscule.";
    header('location: connexion.php');

    exit();

}

// Vérification de la présence d'au moins un chiffre
if (!preg_match('/[0-9]/', $motdepasse)) {
    $_SESSION['notification']= "Le mot de passe doit contenir au moins un chiffre.";
    header('location: connexion.php');

    exit();

}


$req = $bdd->prepare(
        'select prenom, email,motdepasse from utilisateur where email =:email'
);
$req->execute(array('email' =>$email));
$donnee =$req->fetch();

    if ($donnee['email'] != $email){
        header('Location: connexion.php');
    }
    else{
         if (password_verify($motdepasse, $donnee['motdepasse'])) {
            echo '<p>Identification réussie</p>';
            $_SESSION['email'] = $email;
            $_SESSION['prenom'] = $donnee['prenom'];
             $_SESSION['success']= "Vous êtes bien connecté";

             header('Location: homepage.php');
        }
        else{
            header('Location: connexion.php');
        }
    }


?>
