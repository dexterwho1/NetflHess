<?php
require_once "db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="connexion.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">

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
<section class="inscriptionpage">
    <p class ="login "> Pas de  compte ? <a  href="inscription.php">  s'inscrire </a></p>

    <form  style ="background-color: #DDDDDD;" method="post" action="formconnexion.php">
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
                    <input name="email" required  placeholder="adresse email"type="text">
                </div>

                <div>
                    <label><i class="em em-closed_lock_with_key" aria-role="presentation" aria-label="CLOSED LOCK WITH KEY"></i></label>
                    <input name="password"  placeholder=" mot de passe" required type="text">
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