<?php
if (!isset($_SESSION)) {
    session_start();
}try {
    $bdd = new PDO('mysql:host=localhost;dbname=netflhess;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('ERREUR :' . $e->getMessage());
}?>