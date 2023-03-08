<?php
require_once "db.php";
$email = $_POST['email'];
$password=$_POST['password'];

$req = $bdd->prepare(
        'select email,motdepasse from utilisateur where email =:email'
);
$req->execute(array('email' =>$email));
$donnee =$req->fetch();

    if ($donnee['email'] != $email){
        echo"pas bon email";
    }
    else{
        if ($donnee['motdepasse']==$password){
            echo'<p> identification reussi</p>';

        }
        else{
            echo'pas bon';
        }
    }


?>
