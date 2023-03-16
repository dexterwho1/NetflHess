<?php
session_start();
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Netfl-Hess</title>

    <style>
        /* Règles CSS pour les écrans en mode téléphone */
        @media only screen and (max-width: 480px) {

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

        }
    </style>

</head>
<body>

<header style="text-align: center;" class="containerHeader">

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
    </nav>

</header>

<!-- principal -->

<section>

    <!-- film ou série en vedette -->


    <!-- liste d'émoticones servant à trier les films ou séries  par genre -->


    <!-- film ou séries trié -->



    <aside class="movieGallery">

        <?php
        $req= $bdd->prepare('select titre,id,image,realisateur,date_parution,genre, synopsis, prix from film ORDER BY id DESC LIMIT 20');
        $req->execute();

        while ($donnee = $req->fetch()) {
            echo '<li style="margin-right: -30px;" class="singlemovieGallery">';
            echo '<div style="position: relative;">';
            echo '<a  href="mettredanspanier.php?idfilm='. $donnee['id'] .'">
        <i class="em em-shopping_trolley" aria-role="presentation" aria-label="SHOPPING TROLLEY"></i>
    </a>';
            echo '<img src="image/homepage/poster/'.$donnee['image'].'" />';
            echo '<div class="imageButtons">';
            echo '<a href="singlefilm.php?id='.$donnee['id'].'&realisateur='.$donnee['realisateur'].'&idgenre='.$donnee['genre'].'" class="buttonsinglemoviegallery2" > Wahou, je veux le voir <i class="em em-star-struck" aria-role="presentation" aria-label="GRINNING FACE WITH STAR EYES"></i> </button>';
            echo '</div>';
            echo '</div>';
            echo '<a style="display:flex; flex-direction:column; color:grey; font-style: italic; width:30%; min-width: 30%; height:auto; text-decoration: none;" class="liensinglemovieGallery" href="mettredanspanier.php?idfilm='.$donnee['id'].'">';
            echo '<div style="display:flex; flex-direction:column; align-items:flex-start; justify-content:space-between;">
        <a style="font-weight:bold;">'. $donnee['titre'] .'</a> </br>
        <a style="color:#3686ff;" href="afficherfilmdeacteur.php?id='. $donnee['realisateur'] .'">'. $donnee['realisateur'] .'</a>
        <span style="color:#3686ff;"> en '. $donnee['date_parution'] .'</span>
    
</div>';


            echo '</a>';
            echo '</li>';
        }
        ?>

    </aside>



</section>


<footer>


</footer>
</body>
</html>