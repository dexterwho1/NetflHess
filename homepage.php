<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <title>Netfl-Hess</title>
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
                    echo '<a style="color:white; text-decoration: none" href="connexion.php">'.$_SESSION['prenom']. '<a>';
                    echo'<i class="em em-toolbox" aria-role="presentation" aria-label="TOOLBOX"></i>';

                }

                else{

                    echo '<a href="inscription.php"> s\'inscrire <a>';
                    echo '<i class="fa-thin fa-id-card"></i>';
                }
                ?>
            </li>
        </div>
    </nav>

</header>

<!-- principal -->

<section>

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- film ou série en vedette -->
    <?php
    if(isset($_SESSION['success'])) {
        $notification = $_SESSION['success'];
        echo "<script>new Notyf().success('Votre compte à bien été inscrit');</script>";
        unset($_SESSION['success']);
    }
    ?>
    <article class="filmvedettesection">

        <?php
        $req = $bdd->prepare('SELECT titre, synopsis, affiche, realisateur, studio, date_parution, prix FROM film ORDER BY RAND() LIMIT 1');
        $req->execute();
        while ($donnee = $req->fetch()) {
            echo '<style>.filmvedettesection{background-image: url(image/homepage/affiche/'. $donnee['affiche'] .');}</style>';
            echo '<div class="titreFilmvedetteSection">';
            echo $donnee['titre'];
            echo '</div>';
            echo '<div class="resumeFilmvedetteSection">';
            echo $donnee['synopsis'];
            echo '</div>';
            echo '<div class="auteurFilmvedetteSection">';
            echo '<p> de ' . $donnee['realisateur'] . ' - ' . $donnee['date_parution'] . ' - ' . $donnee['studio'] . '</p>';
            echo '</div>';

            echo '<div class="genreFilmvedetteSection">';
            echo '<ul>';
            echo '<li>Décalé</li>';
            echo '<li>Sombre</li>';
            echo '<li>Humour noir</li>';
            echo '</ul>';
            echo '</div>';

            echo '<div class="buyFilmvedetteSection">';
            echo '<p class="pbuyFilmvedetteSection">' . $donnee['prix'] . '</p>';
            echo '<button>Mettre au panier</button>';
            echo '</div>';
        }
        ?>

    </article>

    <!-- liste d'émoticones servant à trier les films ou séries  par genre -->

    <nav class="navCategory">
        <?php
        $req = $bdd->prepare('SELECT nom, image FROM genre limit 8');
        $req->execute();

        while ($donnee = $req->fetch()) {
            echo '<li>';
            echo '<div class="image-container">';
            echo '<img style="height: 60px; width: 50px;" class="imageNavCategory" src="image/homepage/category/'.$donnee['image'].'" />';
            echo '<a href="affichecategorie.php?id='.$donnee["nom"].'">'.$donnee["nom"].'</a>';
            echo '</div>';
            echo '</li>';
        }
        ?>


    </nav>

    <!-- film ou séries trié -->



    <aside class="movieGallery">

        <?php
        $req = $bdd->prepare('SELECT id, realisateur, image, genre, titre, date_parution FROM film limit 25');
        $req->execute();

        while ($donnee = $req->fetch()) {
            echo '<li style="margin-right: -30px;" class="singlemovieGallery">';
            echo '<div style="position: relative;">';

            echo '<img src="image/homepage/poster/'.$donnee['image'].'" />';
            echo '<div class="imageButtons">';
            echo '<a href="singlefilm.php?id='.$donnee['id'].'&realisateur='.$donnee['realisateur'].'&idgenre='.$donnee['genre'].'" class="buttonsinglemoviegallery2" > Wahou, je veux le voir <i class="em em-star-struck" aria-role="presentation" aria-label="GRINNING FACE WITH STAR EYES"></i> </button>';
            echo '</div>';
            echo '</div>';
            echo '<a style="display:flex; flex-direction:column; color:grey; font-style: italic; width:30%; min-width: 30%; height:auto; text-decoration: none;" class="liensinglemovieGallery" href="mettredanspanier.php?idfilm='.$donnee['id'].'" data-realisateur="'.$donnee['realisateur'].'" data-date="en '.$donnee['date_parution'].'">';
            echo '<div style="display:flex; align-items:flex-start; justify-content:space-between;">
        <a style="font-weight:bold;">'. $donnee['titre'] .'</a> </br>
        <a style="color:#3686ff;" href="showfilmbyauthor.php?id='. $donnee['realisateur'] .'">'. $donnee['realisateur'] .'</a>
        <span style="color:#3686ff;"> en '. $donnee['date_parution'] .'</span>
    <a class="buttonsinglemoviegallery" href="mettredanspanier.php?idfilm='. $donnee['id'] .'">
        <i class="em em-shopping_trolley" aria-role="presentation" aria-label="SHOPPING TROLLEY"></i>
    </a>
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