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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tDZBOSXpx2vtyGJPH/BrB/3sNC6UvxQ6UaZ6NDH1+IH3z9g9KjG9fR5C45z+DDh4BcYbivJOfn/x+kvfnBAdFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <title>Netfl-Hess</title>
</head>
<body>

<style>
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
    @media only screen and (max-width: 480px){
        .youtube {
            width:397px;
            margin-left: 2px !important;
        }
        .filmvedettesection {
            width: 523px;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
        .sideBarHeader{
            display:none;
        }
        .containerHeader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: -141px;
        }
        .singlemovieGallery{
            display:none;
        }
    }
</style>


<nav style="text-align: center;" class="containerHeader">

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
    </nav></nav>

</header>

<!-- principal -->

<section>

    <!-- film ou série en vedette -->

    <article class="filmvedettesection">

        <?php
        $req = $bdd->prepare('SELECT id, titre,genre, synopsis, affiche, realisateur, studio, date_parution, prix FROM film  where id=:id');
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
            echo'<a  style="    background-color: #f4bc24;
" class="buttonsinglemoviegallery" href="mettredanspanier.php?idfilm='. $donnee['id'] .'">
        <i class="em em-shopping_trolley" aria-role="presentation" aria-label="SHOPPING TROLLEY"></i>
    </a>';
            echo '</div>';
        }
        ?>

    </article>
    <iframe width="560"  class="youtube"height="315" src="https://www.youtube.com/embed/OVcwNoZdDko" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="    margin-left: 462px;
    margin-top: 12px;"></iframe>
    <!-- liste d'émoticones servant à trier les films ou séries  par genre -->





    <aside class="movieGallery">
        <p> Du même réalisateur</p>
        <?php
        $req = $bdd->prepare('SELECT id, image, titre, date_parution FROM film where realisateur=:idrealisateur');
        $req->execute(array(
            'idrealisateur'=>$_GET['realisateur']
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

        <p> Les acteurs ayant participer au film</p>
        <?php
        $req2 = $bdd->prepare('SELECT acteur FROM film where realisateur=:idrealisateur');
        $req2->execute(array(
            'idrealisateur'=>$_GET['realisateur']
        ));
        while ($donnee2 = $req2->fetch()) {
            echo '<p>'.$donnee2['acteur'].'</p>';
        }
        ?>

    </aside>


</section>


<footer>


</footer>
</body>
</html>