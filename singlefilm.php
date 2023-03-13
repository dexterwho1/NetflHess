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
        <a href="homepage.php">
            Accueil
        </a>

        <a href="showfilm.php">
            Film
        </a>

        <a href="showserie.php">
            Série
        </a>

        <a href="auteur.php">
            Auteur
        </a>

        <a href="dernierenouveaute.php">
            Dernière nouveauté
        </a>

        <a href="homepage.php">
            lancer un film au hasard
        </a>



    </nav>

    <!-- menu horizontal -->

    <nav class="menuHeader">
        <form action="barrederecherche.php" method="POST">
            <input type="search" name="search" placeholder="Alice au pays des merveilles">
            <input type="submit">


        </form>

        <div class="userHeader">
            <a href="panier.php">
                Panier
            </a>

            <li>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="connexion.php">'.$_SESSION['email']. '<a>';

                }

                else{
                    echo '<a href="inscription.php"> s\'inscrire <a>';
                }
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
        $req = $bdd->prepare('SELECT titre,genre, synopsis, affiche, realisateur, studio, date_parution, prix FROM film  where id=:id');
        $req->execute(array(
            'id'=>$_GET['id'])
        );
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
            foreach(explode(",", $donnee['genre']) as $genre) {
                echo '<li>';
                echo $genre;
                echo '</li>';
            }
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





    <aside class="movieGallery">
        <p> Du même réalisateur</p>
        <?php
        $req = $bdd->prepare('SELECT id, image, titre,  date_parution FROM film where realisateur=:idrealisateur');
        $req->execute(array(
            'idrealisateur'=>$_GET['realisateur'])

        );

        while ($donnee = $req->fetch()) {
            echo '<li class="singlemovieGallery">';
            echo '<img src="image/homepage/poster/'.$donnee['image'].'" />';
            echo '<a style="color:grey; font-style: italic; width:30%; min-width: 30%; height:auto; text-decoration: none;" class="liensinglemovieGallery" href="mettredanspanier.php?idfilm='.$donnee['id'].'">';
            echo '<a href="singlefilm.php?id='.$donnee['id'].'">'.$donnee['titre'].'</a> en '.$donnee['date_parution'];
            echo '</a>';
            echo '</li>';
        }
        ?>
        <p> Vous allez adorer ! </p>

        <?php

        $req = $bdd->prepare('SELECT titre, id , image, date_parution FROM film WHERE genre IN (SELECT genre FROM film WHERE id like %:id%)');
        $req->execute(array(
                'id'=>$_GET['id']
        ));
         while ($donnee = $req->fetch()) {
             echo '<li class="singlemovieGallery">';
             echo '<img src="image/homepage/poster/'.$donnee['image'].'" />';
             echo '<a style="color:grey; font-style: italic; width:30%; min-width: 30%; height:auto; text-decoration: none;" class="liensinglemovieGallery" href="mettredanspanier.php?idfilm='.$donnee['id'].'">';
             echo '<a href="singlefilm.php?id='.$donnee['id'].'">'.$donnee['titre'].'</a> en '.$donnee['date_parution'];
             echo '</a>';
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