<?php
//echo "bonjour"

/*
for($i=1;$i<21;$i++){
    echo $i;
    echo"\n";
}
*/

/*
echo "sortie de la boucle, voici la valeur de i : $i<br>";
echo 'sortie de la boucle, voici la valeur de i : $i<br>';
*/
/*
$booleantrue= True;
$boleanfalse=False;
$nulle= NULL;
var_dump($booleantrue);
var_dump($boleanfalse);
var_dump($nulle);

echo"<p>La variable 1 vaut : $booleantrue</p>";
echo"<p>La variable 2 vaut : $boleanfalse</p>";
echo"<p>La variable 3 vaut : $nulle</p>";

*/
/*
echo"<p>L’événement principal ce mois-ci est :<br>";
echo'<span class=’’event’’>’’Oktoberfest’’:/span>:/p>';
*/
/*
for($i=0;$i<11;$i++){
    echo "*";
}
echo"</br>";
echo"retourn a la ligne";
*/

/*
for($i=0; $i<10;$i++){
   echo"*";
   echo"</br>";

}
*/
/*
$tableau=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r',
    's','t','u','v','w','x','y','z'];
$len= count($tableau);
for($i=0; $i<$len;$i++){
    echo $tableau[$i];
}
*/

/*
$tableau=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r',
    's','t','u','v','w','x','y','z'];
$len= count($tableau);
for($i=$len; $i>0;$i--){
    echo $tableau[$i];
}
*/

/*

$mois_jours =[
  "Janvier" => 31,
  "Février" => 28, // ou 29 pour les années bissextiles
  "Mars" => 31,
  "Avril" => 30,
  "Mai" => 31,
  "Juin" => 30,
  "Juillet" => 31,
  "Août" => 31,
  "Septembre" => 30,
  "Octobre" => 31,
  "Novembre" => 30,
  "Décembre" => 31];

$resultat=365;
$paire=0;
foreach($mois_jours as $item => $value):
    if ($value %2 ==0){
        $paire+=1;
    }

    $resultat-=$value;

    echo " le mois $item a $value de jours et il reste exactement $resultat, </br>";
endforeach;
echo"$paire"
*/

/*
$str="l";
$somme=0;
$value=ord($str);
echo $value;
$alphabet = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
    'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
];
$len=count($alphabet);
$i=0;
while($somme<300){

    $value= ord($alphabet[$i]);
    $somme+=$value;
    $i+=1;
}

echo "</br>$somme";
*/
/*
$month=date('m');
echo $date;
switch($month){
    case 1:
        $month="janvier";
        break;
    case 2:
        $month="février";
        break;
    case 3:
        $month="mars";
        break;
    case 4:
        $month="avril";
        break;
    case 5:
        $month="mai";
        break;
    case 6:
        $month="juin";
        break;
    case 7:
        $month="juillet";
        break;
    case 8:
        $month="août";
        break;
    case 9:
        $month="septembre";
        break;
    case 10:
        $month="octobre";
        break;
    case 11:
        $month="novembre";
        break;
    case 12:
        $month="décembre";
        break;
    default:
        $month="Mois inconnu";
        break;
}
$date= date('d');
$date2= date('d-h h: i :s');
$date3=$date.$month.$date2;


echo "</br>$date3";
*/

/*
echo $date;
$date = date('d-m-y h:i:s');
$date = str_replace('-', '/', $date);
echo $date;
*/

/*

include "fonction.php";
fonction();
*/
#pair
/*
$somme=0;
$plus=0;
$tab = ["jerome" => 49,
"luis" => 25,  "sylvie" => 52,"anne" => 18];

foreach ($tab as $indice => $element):
    $somme+=$element;
    if ($plus<$element){
        $plus=$element;
        }
    echo $somme;
    echo "</br>";
endforeach;
echo $plus;
array_unshift($tab,"biquette",3);
array_push($tab,'patricia',22);
print_r($tab);

$utilisateur = "HaCk3RdU37";
$commentaire = "<p><b>Hello !:/b><br>Ceci est mon <u>PREMIER:/u> commentaire:/p>";
echo "<p>Commentaire laissé par ".$utilisateur.":/p>";
echo "<p>".$commentaire.":/p>";
$commentaire= array_replace($commentaire,"""v",''');
echo $commentaire;
 */
$david = "RDTDDRR";
$alexandre = "  DDD DDRR ";
$solange = "DDDDDRR";
$constance = "";

$semaine=[
    'lundi'=>0,
    'mardi'=>1,
    'mercredi'=>2,
    'jeudi'=> 3,
    'vendredi'=>4,
    'samedi'=>5,
    'dimanche'=>6

];
echo "</br> $solange";

$david[$semaine['samedi']]='D';
$alexandre= str_replace(" ","",$alexandre);

for($i=0; $i<7;$i++){
    if ($solange[$i]== 'D') {
        $solange[$i] = 'R';
    }

    else{
        $solange[$i]='D';
    }

}

$constance="RDDDRRR";
echo "</br> $constance";



?>



<?php
// Vérifier si le formulaire est soumis
if ( isset( $_POST['email'] )  ) {
    /* récupérer les données du formulaire en utilisant
       la valeur des attributs name comme clé
      */
    $email = $_POST['email'];
    $password= $_POST['password'];

    if (strlen($email)<4 or strlen($email)>35 or strpos($email,"@")== false or strpos($email,'.')==false or strlen($password)<8 ){
        header('Location: http://127.0.0.1/php/index.html');

    }
    else{
        if($email=='user@user.com' and $password=='password') {
            header('Location: http://127.0.0.1/php/welcolme.php');
        }
        else{
            header('Location: http://127.0.0.1/php/index.html');
        }
    }




}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>
    Formulaire
</h1>

<form action="index.php" method="POST">
    <label for="email"> Quel est votre email ?</label>
    <input type="text" name="email">


    <label for="password"> Quel est votre mot de passe ?</label>
    <input type="password" name="password">


    <label for="submit"> Envoyer </label>
    <input type="SUBMIT" name="submit">

</form>
</body>
</html>

