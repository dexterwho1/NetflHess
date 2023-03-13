<?php
require_once "db.php";

$req = $bdd->prepare('SELECT * FROM voitures ORDER BY prix');
$req->execute();

echo "<table>";
echo "<tr><th>Modèle</th><th>Prix</th><th>Cylindre</th><th>Motorisation</th><th>Type de boite</th><th>Supprimer</th><th>Modifier</th></tr>";
while ($datas = $req->fetch()) {
    echo "<tr>";
    echo "<td id='modele_tr{$datas['id']}' >" . $datas['modele'] . "</td>";
    echo "<td id='id_prix{$datas['id']}'><input type='text' readonly name='prix' value='" . $datas['prix'] . "'></td>";
    echo "<td id='id_cylindre{$datas['id']}'><input type='text' readonly name='cylindre' value='" . $datas['cylindre'] . "'></td>";
    echo "<td id='id_motorisation{$datas['id']}'><input type='text' readonly name='motorisation' value='" . $datas['motorisation'] . "'></td>";
    echo "<td id='id_boite{$datas['id']}'><input type='text' readonly name='boite' value='" . $datas['boite'] . "'></td>";
    echo "<td><a href='remove_vehicle.php?id=" . $datas['id'] . "'>supprimer</a></td>";
    echo "<td id='modifier{$datas['id']}'><button onclick='fonction(" . $datas['id'] . ")'>modifier</button></td>";
    echo "</tr>";
}
echo "</table>";

echo "<form action='add_vehicle.php' method='POST'>";
echo "<label> Modèle </label><input name='modele' type='text'>";
echo "<label> Prix </label><input name='prix' type='text'>";
echo "<label> Cylindre </label><input name='cylindre' type='text'>";
echo "<label> Motorisation </label><input name='motorisation' type='text'>";
echo "<label> Type de boite </label><input name='boite' type='text'>";
echo "<label> Descriptif </label><input name='descriptif' type='text'>";
echo "<label> Marque </label><input name='marque' type='text'>";
echo "<label> Ajouter </label><input type='submit'>";
echo "</form>";


$req->closeCursor();
?>
<form id="form-modifier" action="modifier_vehicle.php" method="POST" style="display:none">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="prix" value="">
    <input type="hidden" name="cylindre" value="">
    <input type="hidden" name="boite" value="">
</form>

<script>

    function valider(id){
        let modele = document.getElementById("modele_tr" + id);
        let motorisation = document.getElementById("id_motorisation" + id);
        let prix = document.getElementById("id_prix" + id);
        let cylindre = document.getElementById("id_cylindre" + id);
        let boite = document.getElementById("id_boite" + id);

        prix.firstChild.readOnly = true;
        cylindre.firstChild.readOnly = true;
        boite.firstChild.readOnly = true;
        motorisation.firstChild.readOnly = true;

        let button = document.getElementById('modifier' + id).firstChild;
        button.innerHTML = 'modifier';
        button.removeEventListener('click', function(){valider(id)});
        button.addEventListener('click', function(){fonction(id)});

        // Ajouter cette ligne pour soumettre le formulaire
        document.getElementById("form-modifier").submit();
    }

    function modifier(id){
        alert(id);
        let button = document.getElementById('modifier' + id).firstChild;
        button.removeEventListener('click', function(){fonction(id)});
    }

    function fonction(id) {
        let modele = document.getElementById("modele_tr" + id);
        let motorisation = document.getElementById("id_motorisation" + id);
        let prix = document.getElementById("id_prix" + id);
        let cylindre = document.getElementById("id_cylindre" + id);
        let boite = document.getElementById("id_boite" + id);

        prix.firstChild.readOnly = false;
        cylindre.firstChild.readOnly = false;
        boite.firstChild.readOnly = false;
        motorisation.firstChild.readOnly = true;

        let button = document.getElementById('modifier' + id).firstChild;
        button.innerHTML = 'valider';
        button.removeEventListener('click', function(){fonction(id)});
        button.addEventListener('click', function(){valider(id)});

    }
</script>
