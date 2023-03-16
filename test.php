<!DOCTYPE html>
<html>
<head>
    <title>Menu vertical</title>
    <style>
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
    </style>
</head>
<body>
<button class="menu-btn">Afficher le menu</button>
<div class="menu">
    <ul>
        <li><a href="#">Lien 1</a></li>
        <li><a href="#">Lien 2</a></li>
        <li><a href="#">Lien 3</a></li>
    </ul>
</div>
<script>
    const btn = document.querySelector('.menu-btn');
    const menu = document.querySelector('.menu');

    btn.addEventListener('click', function() {
        menu.classList.toggle('show');
    });
</script>
</body>
</html>
Explication du code :

Le code HTML contient un bouton avec la classe menu-btn et une div avec la classe menu contenant une liste de liens.
Le code CSS définit le style pour le menu, y compris sa position, sa couleur de fond et sa police.
Le code JavaScript définit un événement de clic sur le bouton qui ajoute ou supprime la classe show du menu.
La classe CSS .menu.show affiche le menu lorsque la classe show est présente.
Notez que ce n'est qu'un exemple et que vous pouvez personnaliser le code en fonction de vos besoins.





