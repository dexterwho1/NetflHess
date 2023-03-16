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
    <link rel="stylesheet" href="connexion.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Netfl-Hess</title>
    <style>
        .forme{
        background-color: #DDDDDD;
        }
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

            input[type="search"] {
                background-color: #d84745;
                height: 50px;
                width: 261px;
                padding: 10px;
                color: white;
                border: none;
                outline: none;
            }


        .userHeader {
            margin-left: -12px;
            padding-right: 12px;
            display: flex;
            max-width: 100%;
            float: right;
            width: 25%;
            justify-content: space-around;
            list-style-type: none;
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
        .containerHeader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: -141px;
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
        <form style="background-color: #d84745;" action="barrederecherche.php" method="POST">
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
<section class="inscriptionpage">
    <p class ="login "> Pas de  compte ? <a  href="inscription.php">  s'inscrire </a></p>

    <form  class="forme"  method="post" action="formconnexion.php">
        <!-- Identité-->
        <fieldset>
            <legend>Connexion</legend>

            <?php
            if (isset($_SESSION['email'])) {
                echo $_SESSION['email'];
                echo '<a href="sedeconnecter.php">Se déconnecter</a>';
            } else {
                echo '
                <div>
                    <label>                    <i class="em em-e-mail" aria-role="presentation" aria-label="E-MAIL SYMBOL"></i>
                    </label>
                    <input name="email" required  placeholder="adresse email"type="email">
                </div>

                <div>
                    <label><i class="em em-closed_lock_with_key" aria-role="presentation" aria-label="CLOSED LOCK WITH KEY"></i></label>
                    <input name="password"  placeholder=" mot de passe" required type="password">
                </div>

                <div>
                    <input class="submit" type="submit">
                </div>
                ';
            }
            ?>
        </fieldset>
    </form>
</section>



<footer>


</footer>
</body>
</html>