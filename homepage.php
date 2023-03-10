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
        <form action="barrederecherche.php" method="POST">
            <input type="search" name="search" placeholder="Alice au pays des merveilles">
            <input type="submit">


        </form>

        <div class="userHeader">
            <li>
                Panier
            </li>

            <li>
                <?php
                echo $_SESSION['email'];
                ?>
            </li>

        </div>
    </nav>

</header>

<!-- principal -->

<section>

    <!-- film ou série en vedette -->

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
        $req = $bdd->prepare('SELECT nom, image FROM genre');
        $req->execute();

        while ($donnee = $req->fetch()) {
            echo '<li>';
            echo '<div class="image-container">';
            echo '<img style="height: 60px; width: 50px;" class="imageNavCategory" src="image/homepage/category/'.$donnee['image'].'" />';
            echo '<span>'.$donnee["nom"].'</span>';
            echo '</div>';
            echo '</li>';
        }
        ?>


    </nav>

    <!-- film ou séries trié -->



    <aside class="movieGallery">

        <?php
        $req = $bdd->prepare('SELECT id, realisateur, image, titre, date_parution FROM film');
        $req->execute();




        while ($donnee = $req->fetch()) {
            echo '<li class="singlemovieGallery">';
            echo '<img src="image/homepage/poster/'.$donnee['image'].'" />';
            echo '<a style="color:grey; font-style: italic; width:30%; min-width: 30%; height:auto; text-decoration: none;" class="liensinglemovieGallery" href="mettredanspanier.php?idfilm='. $donnee['id'] .'">'. $donnee['titre'] .' de '. $donnee['realisateur'] .' en '. $donnee['date_parution'] .'</a>';
            echo '</li>';
        }





        ?>


        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>

        </li>

        <li class="singlemovieGallery">
            <img src="image/homepage/movieGallery.png">
            <p> La nuit des fantomes De Steven Gray 1978</p>
        </li>



    </aside>


</section>


<footer>


</footer>
</body>
</html>