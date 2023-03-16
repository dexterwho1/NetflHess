<?php
$dest = "gabinbussonneau@gmail.com";
$sujet = "Email de test";
$corp = "Salut ceci est un email de test envoyer par un script PHP";
$headers = "From: gabinbussonneau@gmail.com";
if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
} else {
    echo "Échec de l'envoi de l'email...";
}
?>