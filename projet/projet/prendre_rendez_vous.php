

<?php
// Assurez-vous que session_start() est appelé avant toute sortie
session_start();

// Inclure le fichier de configuration ou de fonctions
require "donne_debut.php";

// Vérifiez si la connexion a été établie avec succès
$con = connexion();
$con_rdv = connexion_rdv();

if (!$con) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérifiez si la variable de session 'titre' est définie
if (isset($_SESSION["titre"])) {
    $titre = $_SESSION["titre"];
} else {
    $titre = ''; // Définir une valeur par défaut si 'titre' n'est pas défini
}

echo "<td>" . htmlspecialchars($titre) . "</td>";

// Assurez-vous que la variable $titre est définie et échappée pour éviter les injections SQL
if (!empty($titre)) {
    // Votre requête SQL ici
    $sql = "SELECT nom, prenom, categorie, cv, courriel FROM coach";
    $result = mysqli_query($con, $sql);

    // Vérifiez si la requête a été exécutée avec succès
    if ($result) {
        // Vérifiez si des données ont été renvoyées
        if (mysqli_num_rows($result) > 0) {
            // Appelez votre fonction analyse_recherche ici
            if (analyse_recherche($con, $titre) == 2) {
                echo "yeahh";   
                $result=analyse_recherche_data($con, $titre);
                //$data = mysqli_fetch_assoc($result);
               echo $result['cv'];
               if(ajout_rendez_vous($con_rdv, $result['prenom'], $result['nom'], $result['categorie'], $result['cv'])==TRUE){
                echo "on est boooooon";
               };
            header("Location: voir_plus.php" );
           // exit; // Assurez-vous de terminer le script après la redirection pour éviter toute exécution supplémentaire
            
            } else {
                // header("Location:voir_plus.php");
                echo "nonon";
            }
        } else {
            echo "Aucun résultat trouvé pour le titre spécifié.";
        }
    } else {
        echo "Erreur de requête: " . mysqli_error($con);
    }
} else {
    echo "Le titre n'est pas défini.";
}

// Fermez la connexion à la base de données
mysqli_close($con);
?>