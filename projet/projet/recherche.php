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

<h1>Voici la présentation</h1>

<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre"><br><br>
    <button type="submit">Rechercher</button>
</form>
<table>
<?php

// Identifier le nom de la base de données
$database = "liste_comptes";
$database2 = "services_etablissement";

// Connectez-vous à votre BDD
// Rappel : votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$db_found2 = mysqli_select_db($db_handle, $database2);
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['titre'])) {
    $titre = htmlspecialchars($_GET['titre']); // Sécurisation des données d'entrée

    // Si la BDD existe, faire le traitement
    if ($db_found && $db_found2) {
        $sql = "(SELECT prenom, nom, categorie, cv, NULL, NULL  FROM liste_comptes.coach 
                 WHERE nom='$titre' OR prenom='$titre' OR categorie='$titre' OR courriel='$titre')
                UNION
                (SELECT prenom, nom, courriel, NULL,NULL,NULL FROM liste_comptes.client 
                 WHERE nom='$titre' OR prenom='$titre' OR courriel='$titre')
                UNION
                (SELECT prenom, nom, courriel, specialite, cv, disponibilite FROM liste_comptes.administrateur 
                 WHERE nom='$titre' OR prenom='$titre' OR courriel='$titre')
                UNION
                (SELECT nom_service, numero_salle, telephone, courriel, NULL, NULL FROM services_etablissement.services 
                 WHERE nom_service='$titre' OR numero_salle='$titre' OR telephone='$titre' OR courriel='$titre')";

        $result = mysqli_query($db_handle, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // Afficher les résultats
            while ($data = mysqli_fetch_assoc($result)) {
                if ($data['categorie'] !== null) {
                    // Afficher les données du coach
                    echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                    echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                    echo "<tr><td>Categorie</td><td>" . $data['categorie'] . "</td></tr>";
                    echo "<tr><td>CV</td><td>" . $data['cv'] . "</td></tr>";
                } elseif ($data['categorie'] == null) {
                    // Afficher les données du coach
                    echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                    echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                    echo "<tr><td>Categorie</td><td>" . $data['categorie'] . "</td></tr>";
                    echo "<tr><td>CV</td><td>" . $data['cv'] . "</td></tr>";
                }
                elseif ($data['disponibilite'] !== null) {
                    // Afficher les données du coach
                    echo "<tr><td>Nom</td><td>" . $data['nom'] . "</td></tr>";
                    echo "<tr><td>Prénom</td><td>" . $data['prenom'] . "</td></tr>";
                    echo "<tr><td>Disponibilite</td><td>" . $data['disponibilite'] . "</td></tr>";
                    echo "<tr><td>CV</td><td>" . $data['cv'] . "</td></tr>";
                }
            } 
            } 
            
        else {
            // Aucune donnée trouvée
            echo "<tr><td colspan='2'>Aucune donnée trouvée</td></tr>";
        }
    }else {
        echo "Database not found";
    }

    // Fermer la connexion
    mysqli_close($db_handle);
}
?>
</table>
</body>
</html>
