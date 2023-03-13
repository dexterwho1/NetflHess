<?php
require_once "db.php";
session_start();

$email = $_POST['email'];
$password=$_POST['password'];

$req = $bdd->prepare(
        'select prenom, email,motdepasse from utilisateur where email =:email'
);
$req->execute(array('email' =>$email));
$donnee =$req->fetch();

    if ($donnee['email'] != $email){
        echo"pas bon email";
    }
    else{
        if ($donnee['motdepasse']==$password){
            echo'<p> identification reussi</p>';
            $_SESSION['email']=$email;
            $_SESSION['prenom'] = $donnee['prenom'];

            header('Location: homepage.php');

        }
        else{
            echo'pas bon';
        }
    }


?>
