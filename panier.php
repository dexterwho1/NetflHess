<?php
require_once "db.php";
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="panier.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Netfl-Hess</title>
</head>
<body>

<header class="containerHeader">

    <!-- side Bar -->
    <nav class="sideBarHeader">
        <i>
            Accueil
        </i>

        <i>
            Film
        </i>

        <i>
            Série
        </i>

        <i>
            Auteur
        </i>

        <i>
            Dernière nouveauté
        </i>

        <i>
            lancer un film au hasard
        </i>



    </nav>

    <!-- menu horizontal -->

    <nav class="menuHeader">
        <form>
            <input type="search" placeholder="Alice au pays des merveilles">
            <input type="submit">


        </form>

        <div class="userHeader">
            <li>
                Panier
            </li>

            <li>
                utilisateur
            </li>

        </div>
    </nav>

</header>

<!-- principal -->
<?php

if(isset($_SESSION['email'])){
    ?>

    <section class="checkout">
        <form>
            <fieldset style="width: 150%;">
                <legend style="margin-top: 15px;">Mon panier <i class="em em-shopping_trolley" aria-role="presentation" aria-label="SHOPPING TROLLEY"></i></legend>
                <div class="panier">
                    <?php
                    $req = $bdd->prepare('SELECT film.id, titre, prix, affiche FROM film INNER JOIN panier ON film.id = panier.id_film WHERE id_utilisateur = :id');
                    $req->execute(array(
                        ':id' => $_SESSION['email']
                    ));
                    while ($donnee = $req->fetch()) {
                        ?>
                        <div class="elementpanier ">
                            <div class="gauchepanier">
                                <img src="image/homepage/poster/<?= $donnee['affiche'] ?>">
                                <p><?= $donnee['titre'] ?></p>
                            </div>
                            <div class="droitepanier">
                                <p><?= $donnee['prix'] ?></p>
                                <a href="enleverpanier.php?id=<?= $donnee['id'] ?>"><i class="em em-x" aria-role="presentation" aria-label="CROSS MARK"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                    $req->closeCursor();
                    ?>
                </div>
                <div class="baspanier">
                    <div class="montantetresumebaspanier">
                        <p> Montant total :
                            <?php
                            $req = $bdd->prepare('SELECT SUM(prix) FROM film JOIN panier ON film.id = panier.id_film WHERE id_utilisateur = :id');
                            $req->execute(array(
                                ':id' => $_SESSION['email']
                            ));
                            $donnee = $req->fetch();
                            echo $donnee['SUM(prix)'];
                            echo'€';
                            $req->closeCursor();
                            ?>
                        </p>
                        <button class="submit">valider le panier</button>
                    </div>
                    <div>
                        <a href="viderpanier.php?id=<?= $_SESSION['email'] ?>"> <i class="em em-wastebasket" aria-role="presentation" aria-label=""></i>supprimer</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>

    <?php
}else{
    $_SESSION['notification']= "Merci, de vous connecter ou inscrire pour accéder à vote panier";
    header("Location: inscription.php");

    exit();
}
?>




</section>

<footer>


</footer>
</body>
</html>