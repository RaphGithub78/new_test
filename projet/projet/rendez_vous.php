
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

<style>
    .hidden {
        display: none;
    }
</style>

</head>

<body>
<h2>Liste des rendez-vous</h2>

<button onclick="afficherBarre()">supprimer un rendez-vous?</button>
<button onclick="window.location.href = 'index.html';">revenir a l'acceuil</button>
<div id="barre" class="hidden">
    <form id="myForm" action="supprimer_rdv.php" method="post">
        <textarea id="zoneTexte" name="texte" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Envoyer">
    </form>
</div>
<script>
    function afficherBarre() {
        var barre = document.getElementById("barre");
        barre.classList.remove("hidden");
    }
</script>




<?php
require "donne_debut.php";

$con_rdv = connexion_rdv();
$result= afficher_rdv($con_rdv);
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Catégorie</th><th>date</th></tr>";
echo "<tr><td>" . htmlspecialchars($result['nom']) . "</td>";
echo "<td>" . htmlspecialchars($result['prenom']) . "</td>";
echo "<td>" . htmlspecialchars($result['date']) . "</td></tr>";
echo "</table>";
?>
</body>
</html>
