<?php
require_once "db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="inscription.css">

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
<section class="inscriptionPage">
    <form method='post' action='formconnexion.php'>

        <!-- Identité-->
        <fieldset>
            <legend>
               Connexion
            </legend>
            <?php
            if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
            echo '<a href="sedeconnecter.php">
                    Se déconnecter
                </a>';
            } else {
                echo'<div>
                <label>
                Adresse e-mail
                </label>
                <input name="email" required type="text">

                <label>
                Mot de passe
                </label>
                <input name="password" required type="text">

                <input type="submit">
            </div>
        </fieldset>';            }

            ?>









    </form>

</section>


<footer>


</footer>
</body>
</html>