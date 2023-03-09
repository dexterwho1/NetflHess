<?php
require_once "db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="panier.css">

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
<section class="checkout">
    <form>
        <fieldset style="width: 150%;">
            <legend>
                Mon panier
            </legend>
            <div class="panier">
                <?php
                $req = $bdd->prepare('SELECT film.id, titre, prix, affiche FROM film INNER JOIN panier ON film.id = panier.id_film WHERE id_utilisateur = :id');
                $req->execute(array(
                    ':id' => $_SESSION['email']
                ));
                while ($donnee = $req->fetch()) {
                    ?>
                    <div class="elementpanier">
                        <div class="gauchepanier">
                            <img src="image/homepage/poster/<?= $donnee['affiche'] ?>">
                            <p>
                                <?= $donnee['titre'] ?>
                            </p>
                        </div>
                        <div class="droitepanier">
                            <p>
                                <?= $donnee['prix'] ?>
                            </p>
                            <a href="enleverpanier.php?id=<?= $donnee['id'] ?>">supprimer</a>
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
                        $req->closeCursor();
                        ?>
                    </p>
                    <button>
                        valider le panier
                    </button>
                </div>
                <div>
                    <a href="viderpanier.php?id=<?= $_SESSION['email'] ?>">supprimer</a>
                </div>
            </div>
        </fieldset>
    </form>


</section>

<footer>


</footer>
</body>
</html>