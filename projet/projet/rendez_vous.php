
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
</head>
<h2>Liste des rendez-vous</h2>

<button onclick="window.location.href = 'analyse_cv.php';">analyse_cv</button>
<body>


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
