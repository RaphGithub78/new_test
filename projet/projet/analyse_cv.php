<?php

require "donne_debut.php"; // Assurez-vous que ce fichier contient la fonction 'connexion' et d'autres configurations nécessaires.
$con = connexion(); // Établir la connexion à la base de données

// Vérifiez si la connexion a été établie avec succès
if (!$con) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Assurez-vous que l'email est défini et échappez-le pour éviter les injections SQL
    $sql = "SELECT nom, prenom, categorie, cv, courriel FROM coach ";
    $result = mysqli_query($con, $sql);

    // Vérifiez si la requête a été exécutée avec succès
    if ($result) {
        // Vérifiez si des données ont été renvoyées
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo $data['cv'];
            $dat ="cv_louisforget.html";
            header("Location: " . $data['cv']);
            exit; // Assurez-vous de terminer le script après la redirection pour éviter toute exécution supplémentaire
            

        } else {
            echo "Aucun résultat trouvé pour l'email spécifié.";
        }
    } else {
        echo "Erreur de requête: " . mysqli_error($con);
    }

// Fermez la connexion à la base de données
mysqli_close($con);

?>
