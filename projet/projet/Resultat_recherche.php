
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
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
            font-size: 1.2em;
            color: #555;
        }
        input[type="text"] {
            width: 250px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        input[type="text"]::placeholder {
            color: #999;
            font-style: italic;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            margin-left: 10px;
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
    </style>
</head>
<body>
<button onclick="window.location.href = 'recherche.php';">Revenir à la recherche</button>
<button onclick="window.location.href = 'voir_plus.php';">voir plus</button>
    </body>

<table>
            <?php
require "donne_debut.php";

$con =connexion();

            // Identifier le nom de la base de données
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['titre'])) {
                $titre = htmlspecialchars($_GET['titre']); // Sécurisation des données d'entrée

                // Si la BDD existe, faire le traitement
                if (analyse_recherche($con, $titre)!=-1) {
                    
                    if (mysqli_num_rows($result) > 0) {
                        // Afficher les résultats
                        while ($data = mysqli_fetch_assoc($result)) {
                            if (analyse_recherche($con, $titre)==1) {
                                // Afficher les données du coach
                                echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                                echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                                echo "<tr><td>Categorie</td><td>" . $data['categorie'] . "</td></tr>";
                                echo "<tr><td>CV</td><td>" . $data['cv'] . "</td></tr>";
                            } elseif (analyse_recherche($con, $titre)==2) {
                                // Afficher les données du client ou administrateur
                                echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                                echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                                echo "<tr><td>Email</td><td>" . $data['courriel'] . "</td></tr>";
                            } elseif (analyse_recherche($con, $titre)==3) {
                                // Afficher les données de l'administrateur
                                echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                                echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                                echo "<tr><td>Disponibilite</td><td>" . $data['disponibilite'] . "</td></tr>";
                                echo "<tr><td>CV</td><td>" . $data['cv'] . "</td></tr>";
                            }
                        }
                    } else {
                        // Aucune donnée trouvée
                        echo "<tr><td colspan='2'>Aucune donnée trouvée</td></tr>";
                    }
                } else {
                    echo "Database not found";
                }

                // Fermer la connexion
                mysqli_close($db_handle);
            }
            ?>
        </table>