<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="inscription.css">
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
<section class="inscriptionPage">
    <p class ="login "> Déja un compte ? <a  href="connexion.php">  se connecter </a></p>

    <form method='post' action='forminscription.php'>
    <div class="upforminscription">

        <!-- Identité-->
        <div class="inscriptiontext">
            <h1>
                S'inscrire
            </h1>
            <p>
                L'inscription peut se montrer nécessaire pour certaines fonctionnalités
            </p>
        </div>
        <div class="inscriptioncontent">
          <fieldset>
              <legend>
                  Identité
              </legend>
            <div>
                <label>
                    <i class="em em-name_badge" aria-role="presentation" aria-label="NAME BADGE"></i>
                </label>

                <input type="text" name="lastname" placeholder="nom de famille">
            </div>

            <div>

                <label>
                    <i class="em em-raising_hand" aria-role="presentation" aria-label="HAPPY PERSON RAISING ONE HAND"></i>                </label>
                <input type="name" name="firstname" placeholder="Prénom">

            </div>
          </fieldset>

         <fieldset>
             <legend>
                 Connexion
             </legend>
             <div>
                 <label>
                     <i class="em em-e-mail" aria-role="presentation" aria-label="E-MAIL SYMBOL"></i>
                 </label>
                 <input type="email" name="email" placeholder="email">

             </div>

             <div>
                 <label>
                     <i class="em em-key" aria-role="presentation" aria-label="KEY"></i>
                 </label>
                 <input type="password" name="password" placeholder="mot de passe">
             </div>
         </fieldset>

        <fieldset>
            <legend>
                Facturation
            </legend>
            <div>
                <label>
                    <i class="em em-house" aria-role="presentation" aria-label="HOUSE BUILDING"></i>
                </label>
                <input type="text" required name="facturation" placeholder="L'adresse de facturation">

            </div>

            <div>
                <label>
                    <i class="em em-truck" aria-role="presentation" aria-label="L'adresse de livraison"></i>
                </label>
                <input type="text" required name="livraison" placeholder="Adresse de livraison">

            </div>

            <div>
                <label>
                    <i class="em em-phone" aria-role="presentation" aria-label="BLACK TELEPHONE"></i>
                </label>
                <input type="tel" required name="phone" placeholder="numéro de téléphone">
            </div>

        </fieldset>

        <fieldset>
            <legend>
                Paiement
            </legend>
            <div>
                <input type="radio" name="checkout"> Paypal
                <input type="radio" name="checkout"> Master Card
            </div>
        </fieldset>

            <fieldset>

                <div>
                    <input   required name="contactme" type="checkbox">
                    j'accepte de me faire contacter
                </div>

                <div>
                    <input  required type="checkbox">
                    j'accepte les conditions d'utilisation
                </div>
            </fieldset>

            <div>
                <input class="submit" type="submit">
            </div>
        </div >

    </form>
    </div>


</section>


<footer>


</footer>
</body>
</html>