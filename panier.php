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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="telephone.css">
    <link rel="stylesheet" href="showfilmtelephone.css">
    <link rel="stylesheet" href="showfilm.css">


    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Netfl-Hess</title>

    <style>

        .menu-btn{
            display:none;
        }
        .menu {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            padding: 10px;
            border-radius: 5px;
        }

        .menu.show {
            display: block;
        }

        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            margin-bottom: 10px;
        }

        .menu a {
            display: block;
            padding: 5px;
            color: #333;
            text-decoration: none;
        }

        .menu a:hover {
            background-color: #333;
            color: #fff;
        }

        /* Règles CSS pour les écrans en mode téléphone */
        @media only screen and (max-width: 480px) {

            .userHeader {
                margin-left: 63px;
                padding-right: 12px;
                display: flex;
                max-width: 100%;
                float: right;
                width: 25%;
                justify-content: space-around;
                list-style-type: none;
            }
            .sideBarHeader {

                display: none;
            }
            .containerHeader {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-left: -114px;
            }
            .movieGallery {
                margin-top: 55px;
                margin-left: 33px;
                margin-right: -111px; /* Ajouter une marge à droite */
                list-style: none;
                display: grid;
                flex-direction: column-reverse;
                grid-template-columns: 1fr 1fr 1fr;
            }

            input[type="search"] {
                background-color: #d84745;
                height: 50px;
                width: 261px;
                padding: 10px;
                color: white;
                border: none;
                outline: none;
            }
            .menu-btn{
                display: block;
            }
            .ahomepage{
                display:none;
            }
            .navCategory {

                display: grid;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<nav style="text-align: center;" class="containerHeader">

    <!-- side Bar -->
    <nav class="sideBarHeader">

        <a class="firstsidebarheader " style="color: #ff4250;margin-top: 15px; "href="homepage.php">
            Accueil
            <i style="    filter: grayscale(0%);
; "class=" coloresidebarheader em em-house_with_garden" aria-role="presentation" aria-label="HOUSE WITH GARDEN"></i>
        </a>

        <a href="showfilm.php">
            Film
            <i class="em em-popcorn" aria-role="presentation" aria-label="POPCORN"></i>

        </a>

        <a href="showserie.php">
            Série
            <i class="em em-tv" aria-role="presentation" aria-label="TELEVISION"></i>
        </a>

        <a href="auteur.php">
            Auteur
            <i class="em em-male-technologist" aria-role="presentation" aria-label=""></i>
        </a>

        <a href="dernierenouveaute.php">
            Dernière nouveauté
            <i class="em em-new" aria-role="presentation" aria-label="SQUARED NEW"></i>
        </a>

        <a href="homepage.php">
            lancer un film au hasard
            <i class="em em-twisted_rightwards_arrows" aria-role="presentation" aria-label="TWISTED RIGHTWARDS ARROWS"></i>
        </a>



    </nav>

    <!-- menu horizontal -->

    <nav class="menuHeader">
        <button class="menu-btn">menu</button>
        <div class="menu">
            <ul>
                <li><a href="homepage.php"><span>Accueil</span><i class="coloresidebarheader em em-house_with_garden" aria-role="presentation" aria-label="HOUSE WITH GARDEN"></i></a></li>

                <li><a href="showfilm.php"><span>Film</span><i class="em em-popcorn" aria-role="presentation" aria-label="POPCORN"></i></a></li>

                <li><a href="showserie.php"><span>Série</span><i class="em em-tv" aria-role="presentation" aria-label="TELEVISION"></i></a></li>

                <li><a href="auteur.php"><span>Auteur</span><i class="em em-male-technologist" aria-role="presentation" aria-label=""></i></a></li>

                <li><a href="dernierenouveaute.php"><span>Dernière nouveauté</span><i class="em em-new" aria-role="presentation" aria-label="SQUARED NEW"></i></a></li>

                <li><a href="homepage.php"><span>Lancer un film au hasard</span><i class="em em-twisted_rightwards_arrows" aria-role="presentation" aria-label="TWISTED RIGHTWARDS ARROWS"></i></a></li>
                <li><a href="homepage.php"><span>Connexion</span><i class="em em-twisted_rightwards_arrows" aria-role="presentation" aria-label="TWISTED RIGHTWARDS ARROWS"></i></a></li>

                <?php
                if (isset($_SESSION['prenom'])) {
                    echo '<li><a class="accountname" style="color:white; text-decoration: none" href="connexion.php">'.$_SESSION['prenom']. '<a>';
                    echo'<i class="em em-toolbox" aria-role="presentation" aria-label="TOOLBOX"></i></li>';

                }

                else{

                    echo '<li><a class="ahomepage" href="inscription.php"> s\'inscrire <a>';
                    echo '<i class="fa-thin fa-id-card"></i></li>';
                }
                ?>
            </ul>
        </div>
        <script>
            const btn = document.querySelector('.menu-btn');
            const menu = document.querySelector('.menu');

            btn.addEventListener('click', function() {
                menu.classList.toggle('show');
            });
        </script>
        <form action="barrederecherche.php" method="POST">
            <input type="search" name="search" placeholder="  Rechercher un film, série ou auteur ">
            <button type="submit">
                <i class="em em-mag" aria-role="presentation" aria-label="LEFT-POINTING MAGNIFYING GLASS"></i>            </button>


        </form>

        <div class="userHeader">
            <a href="panier.php">
                <i class="em em-shopping_trolley" aria-role="presentation" aria-label="SHOPPING TROLLEY"></i>
            </a>

            <li class="account">
                <?php
                if (isset($_SESSION['prenom'])) {
                    echo '<a class="accountname" style="color:white; text-decoration: none" href="connexion.php">'.$_SESSION['prenom']. '<a>';
                    echo'<i class="em em-toolbox" aria-role="presentation" aria-label="TOOLBOX"></i>';

                }

                else{

                    echo '<a class="ahomepage" href="inscription.php"> s\'inscrire <a>';
                    echo '<i class="fa-thin fa-id-card"></i>';
                }
                ?>
            </li>
        </div>
    </nav></nav>

<!-- principal -->
<?php

if(isset($_SESSION['email'])){
    ?>

    <section class="checkout">
        <form action="mettredansliste.php" method="POST">
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