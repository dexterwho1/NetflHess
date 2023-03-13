<?php
function fonction()
{
    $mois_jours = [
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

    $resultat = 365;
    $paire = 0;
    foreach ($mois_jours as $item => $value):
        if ($value % 2 == 0) {
            $paire += 1;
        }

        $resultat -= $value;

        echo " le mois $item a $value de jours et il reste exactement $resultat, </br>";
    endforeach;
    echo "$paire";
    foreach($mois_jours as $item =>$value):
        print_r( $item);
        echo"</br>";

    endforeach;}
?>
