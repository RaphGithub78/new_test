<?php
// Assurez-vous que session_start() est appelé avant toute sortie
session_start();

// Inclure le fichier de configuration ou de fonctions
require "donne_debut.php";

// Vérifiez si la connexion a été établie avec succès
$con = connexion();
if (!$con) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérifiez si la variable de session 'titre' est définie
$titre = isset($_SESSION["titre"]) ? $_SESSION["titre"] : '';

// Afficher la variable 'titre' échappée pour éviter les attaques XSS
echo "<td>" . htmlspecialchars($titre) . "</td>";

// Assurez-vous que la variable $titre est définie et échappée pour éviter les injections SQL
if (!empty($titre)) {
    // Préparez votre requête SQL ici
    $sql = "SELECT nom, prenom, categorie, cv, courriel FROM coach";
    $result = mysqli_query($con, $sql);

    // Vérifiez si la requête a été exécutée avec succès
    if ($result) {
        // Vérifiez si des données ont été renvoyées
        if (mysqli_num_rows($result) > 0) {
            // Appelez votre fonction analyse_recherche ici
            $analyse_result = analyse_recherche($con, $titre);
            if ($analyse_result == 1) {
                $sql7 = "DELETE FROM client WHERE prenom = ? OR nom = ?";
                $types = 'ss'; // Deux strings pour prenom et nom
                $params = [$titre, $titre];
            } else if ($analyse_result == 2) {
                $sql7 = "DELETE FROM coach WHERE prenom = ? OR nom = ? OR categorie = ?";
                $types = 'sss'; // Trois strings pour prenom, nom, categorie
                $params = [$titre, $titre, $titre];
                echo "yayayaya";
                echo htmlspecialchars($titre); // Échapper la sortie pour éviter XSS
            } else {
                echo "nonon";
            }

            // Si une requête de suppression a été définie, exécutez-la
            if (isset($sql7)) {
                // Préparer la requête pour éviter les injections SQL
                $stmt = mysqli_prepare($con, $sql7);
                mysqli_stmt_bind_param($stmt, $types, ...$params);
                mysqli_stmt_execute($stmt);

                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    echo "Suppression réussie.";
                    header("Location: Resultat_recherche.php");
                    exit;
                } else {
                    echo "Aucune ligne affectée.";
                }

                // Fermer la déclaration préparée
                mysqli_stmt_close($stmt);
            }
        } else {
            echo "Aucun résultat trouvé pour le titre spécifié.";
            header("Location: Resultat_recherche.php");
            exit;
        }
    } else {
        echo "Erreur de requête: " . mysqli_error($con);
    }
}

// Fermez la connexion à la base de données
mysqli_close($con);
?>
