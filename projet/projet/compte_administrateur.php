<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte Administrateur</title>
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
    <button onclick="window.location.href = 'services.html';">Revenir à l'accueil</button>
    <button onclick="window.location.href = 'deconnexion.php';">deconnexion</button>
    <button onclick="window.location.href = 'ajout_coach.php';">supprimer le compte</button>

    <div class="container">
        <h1>Mon Compte Utilisateur</h1>
        <table>
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
            <?php
            // Démarrage de la session
            session_start();

            // Inclusion du fichier de connexion
            require 'donne_debut.php';

            // Connexion à la base de données
            $con = connexion();

            // Vérification de l'email dans la session
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];

                // Échappement de l'email pour éviter les injections SQL
                $email = mysqli_real_escape_string($con, $email);

                // Requête SQL
                $sql = "SELECT nom, prenom, specialite, cv, disponibilite, courriel FROM administrateur WHERE courriel='$email'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $data = mysqli_fetch_assoc($result);

                    // Affichage des données dans le tableau HTML
                    if ($data) {
                        echo "<tr><td>Nom</td><td>" . htmlspecialchars($data['nom']) . "</td></tr>";
                        echo "<tr><td>Prénom</td><td>" . htmlspecialchars($data['prenom']) . "</td></tr>";
                        echo "<tr><td>Email</td><td>" . htmlspecialchars($data['courriel']) . "</td></tr>";
                        echo "<tr><td>CV</td><td>" . htmlspecialchars($data['cv']) . "</td></tr>";
                        echo "<tr><td>Rendez-vous</td><td>01/06/2024</td></tr>";
                        echo "<tr><td>Mot de passe</td><td>" . htmlspecialchars($data['disponibilite']) . "</td></tr>";
                    } else {
                        echo "<tr><td colspan='2'>Aucune donnée trouvée</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Erreur lors de la récupération des données</td></tr>";
                }

                // Libération des résultats
                mysqli_free_result($result);
            } else {
                echo "<tr><td colspan='2'>Aucun email trouvé dans la session</td></tr>";
            }

            // Fermeture de la connexion
            mysqli_close($con);
            ?>
        </table>
    </div>
</body>
</html>
