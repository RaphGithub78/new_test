<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site PHP</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .buttons {
            text-align: center;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            margin: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: normal;
        }
        .no-data {
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="buttons">
        <button onclick="window.location.href = 'recherche.php';">Revenir à la recherche</button>
        <button onclick="window.location.href = 'voir_plus.php';">Voir plus</button>
    </div>

    <table>
        <?php
        require "donne_debut.php";

        $con = connexion();
        $con_salles = connexion_salles();

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['titre'])) {
            $titre = htmlspecialchars($_GET['titre']); // Sécurisation des données d'entrée
            session_start();
            $_SESSION["titre"] = $titre;  

            if ((analyse_recherche($con, $titre) != -1) || (analyse_recherche_salles($con_salles, $titre) !=-1) ) {
                $result = analyse_recherche_data($con, $titre);

                if ($result) {
                    if (analyse_recherche($con, $titre) == 2) {
                        // Afficher les données du coach
                        echo "<tr><td>Nom</td><td>" . htmlspecialchars($result['nom']) . "</td></tr>";
                        echo "<tr><td>Prénom</td><td>" . htmlspecialchars($result['prenom']) . "</td></tr>";
                        echo "<tr><td>Categorie</td><td>" . htmlspecialchars($result['categorie']) . "</td></tr>";
                        echo "<tr><td>CV</td><td>" . htmlspecialchars($result['cv']) . "</td></tr>";
                    } elseif (analyse_recherche($con, $titre) == 1) {
                        // Afficher les données du client ou administrateur
                        echo "<tr><td>Nom</td><td>" . htmlspecialchars($result['nom']) . "</td></tr>";
                        echo "<tr><td>Prénom</td><td>" . htmlspecialchars($result['prenom']) . "</td></tr>";
                        echo "<tr><td>Email</td><td>" . htmlspecialchars($result['courriel']) . "</td></tr>";
                    } elseif (analyse_recherche_salles($con_salles, $titre) !=-1) {
                        // Afficher les données de l'administrateur
                        $result = analyse_recherche_salles($con_salles, $titre);
                        echo "<tr><td>Nom</td><td>" . htmlspecialchars($result['nom']) . "</td></tr>";
                        echo "<tr><td>numero</td><td>" . htmlspecialchars($result['numero']) . "</td></tr>";
                        echo "<tr><td>courriel</td><td>" . htmlspecialchars($result['courriel']) . "</td></tr>";
                        echo "<tr><td>categorie</td><td>" . htmlspecialchars($result['categorie']) . "</td></tr>";
                    }
                } else {
                    // Aucune donnée trouvée
                    echo "<tr><td colspan='2' class='no-data'>Aucune donnée trouvée</td></tr>";
                }
            } else {
                echo "Database not found";
            }
        }
        ?>
    </table>
</div>

</body>
</html>
