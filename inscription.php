<?php
require_once "db.php";
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
    <form method='post' action='forminscription.php'>

    <!-- Identité-->
      <fieldset>
          <legend>
              Identité
          </legend>
        <div>
            <label>
                Nom
            </label>
            <input type="text" name="lastname" placeholder="dupont">
        </div>

        <div>
            <label>
                prenom
            </label>
            <input type="name" name="firstname" placeholder="martin">

        </div>
      </fieldset>

     <fieldset>
         <legend>
             Connexion
         </legend>
         <div>
             <label>
                 adresse-email
             </label>
             <input type="email" name="email" placeholder="email">

         </div>

         <div>
             <label>
                 mot de passe
             </label>
             <input type="password" name="password" placeholder="Pas1234">
         </div>
     </fieldset>

    <fieldset>
        <legend>
            Facturation
        </legend>
        <div>
            <label>
                Adresse de facturation
            </label>
            <input type="text" required name="facturation" placeholder="avenue des moulins rouge">

        </div>

        <div>
            <label>
                Adresse de livraison
            </label>
            <input type="text" required name="livraison" placeholder="Adresse de livraison">

        </div>

        <div>
            <label>
                Numéro de téléphone
            </label>
            <input type="tel" required name="phone" placeholder="06 30 85 89 45">
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
            <input type="submit">
        </div>
    </form>
    <a class ="login " href="connexion.php"> Deja un compte ? se connecter </a>


</section>


<footer>


</footer>
</body>
</html>