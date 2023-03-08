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
                <div class="elementpanier">
                    <div class="gauchepanier">
                        <img src="image/homepage/poster/affiche.png">
                        <p>
                            Les démons de minuits
                        </p>
                    </div>

                    <div class="droitepanier">
                        <p>
                            17,90€
                        </p>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>

                <div class="elementpanier">
                    <div class="gauchepanier">
                        <img src="image/homepage/poster/affiche.png">
                        <p>
                            Le voyage de Chihiro
                        </p>
                    </div>

                    <div class="droitepanier">
                        <p>
                            12,99€
                        </p>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>

                <div class="elementpanier">
                    <div class="gauchepanier">
                        <img src="image/homepage/poster/affiche.png">
                        <p>
                            La la land
                        </p>
                    </div>

                    <div class="droitepanier">
                        <p>
                            9,99€
                        </p>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>

                <div class="elementpanier">
                    <div class="gauchepanier">
                        <img src="image/homepage/poster/affiche.png">
                        <p>
                            Inception
                        </p>
                    </div>

                    <div class="droitepanier">
                        <p>
                            8,50€
                        </p>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>

                <div class="elementpanier">
                    <div class="gauchepanier">
                        <img src="image/homepage/poster/affiche.png">
                        <p>
                            Les évadés
                        </p>
                    </div>

                    <div class="droitepanier">
                        <p>
                            14,99€
                        </p>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>
            </div>
        <div class="baspanier">
            <div class="montantetresumebaspanier">
                <p> Montant total : 17€ </p>
                <button>
                    valider le panier
                </button>

            </div>

            <div>
                <button>
                    Vider le panier
                </button>



            </div>


        </div>
        </fieldset>
    </form>


</section>

<footer>


</footer>
</body>
</html>