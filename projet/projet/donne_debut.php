<?php
// Connexion à la base de données SIGE

function connexion() {
    $database = "liste_comptes";
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    if (!$db_handle) {
        die("Erreur connexion à MySQL DB : " . mysqli_connect_error());
    }

    return $db_handle;
}

function listeniveau($con, $password, $email) {
    $sql = "(SELECT c.prenom, c.nom, c.dossier, c.courriel, c.mot_de_passe
             FROM client AS c
             WHERE c.mot_de_passe='$password' AND c.courriel='$email')
            UNION
            (SELECT a.prenom, a.nom, NULL, a.courriel, a.mot_de_passe
             FROM administrateur AS a
             WHERE a.mot_de_passe='$password' AND a.courriel='$email')
            UNION
            (SELECT co.prenom, co.nom, NULL, co.courriel, co.mot_de_passe
             FROM coach AS co
             WHERE co.mot_de_passe='$password' AND co.courriel='$email')";

    $curseur = mysqli_query($con, $sql);

    if (!$curseur) {
        echo "Erreur fonction chargement niveau : " . mysqli_error($con);
        return FALSE;
    } else {
        if ($data = mysqli_fetch_assoc($curseur)) {
            echo "yeahhh";
            return TRUE;
        } else {
            echo "pbbbb";
            return FALSE;
        }
    }
}


function analyse_connection($con, $password, $email) {
    // Requête pour récupérer le nom et le mot de passe des différents utilisateurs
    $sql1 = "SELECT nom, mot_de_passe FROM client WHERE courriel='$email'";
    $sql2 = "SELECT nom, mot_de_passe FROM coach WHERE courriel='$email'";
    $sql3 = "SELECT nom, mot_de_passe FROM administrateur WHERE courriel='$email'";

    $curseur1 = mysqli_query($con, $sql1);
    $curseur2 = mysqli_query($con, $sql2);
    $curseur3 = mysqli_query($con, $sql3);

    // Vérifier les résultats pour chaque type d'utilisateur
    if ($data = mysqli_fetch_assoc($curseur1)) {
   
            return 1; // Client trouvé

    }
    else if ($data = mysqli_fetch_assoc($curseur2)) {

            return 2; // Coach trouvé
        }

    else if ($data = mysqli_fetch_assoc($curseur3)) {

            return 3; // Administrateur trouvé
        }
    else {

        return -1;

    }
}

function analyse_recherche($con, $titre) {
    // Requête pour récupérer le nom et le mot de passe des différents utilisateurs
    $sql1 = "SELECT prenom, nom, categorie, cv, NULL, NULL  FROM liste_comptes.coach 
WHERE nom='$titre' OR prenom='$titre' OR categorie='$titre' OR courriel='$titre'";

    $sql2 = "SELECT prenom, nom, courriel, NULL,NULL,NULL FROM liste_comptes.client 
    WHERE nom='$titre' OR prenom='$titre' OR courriel='$titre'";



    $curseur1 = mysqli_query($con, $sql1);
    $curseur2 = mysqli_query($con, $sql2);

    // Vérifier les résultats pour chaque type d'utilisateur
    if ($data = mysqli_fetch_assoc($curseur1)) {
   
            return 2; 

    }
    else if ($data = mysqli_fetch_assoc($curseur2)) {

            return 1; 
        }
    else {

        return -1;

    }
}

function analyse_recherche_data($con, $titre) {
    // Requête pour récupérer les informations des différents utilisateurs
    $sql1 = "SELECT prenom, nom, categorie, cv, NULL, NULL  FROM liste_comptes.coach 
    WHERE nom='$titre' OR prenom='$titre' OR categorie='$titre' OR courriel='$titre'";

$sql2 = "SELECT prenom, nom, courriel, NULL,NULL,NULL FROM liste_comptes.client 
WHERE nom='$titre' OR prenom='$titre' OR courriel='$titre'";

    $curseur1 = mysqli_query($con, $sql1);
    $curseur2 = mysqli_query($con, $sql2);

    // Vérifier les résultats pour chaque type d'utilisateur
    if ($data = mysqli_fetch_assoc($curseur1)) {
        return $data; 
    } else if ($data2 = mysqli_fetch_assoc($curseur2)) {
        return $data2; 
    } else {
        return -1; // Aucun utilisateur trouvé
    }
}



function supprimer_utilisateur_test($con, $titre){
    
       $sql7=" DELETE FROM coach WHERE prenom = '$titre'";
   
    
    if(mysqli_query($con, $sql7)){
        return TRUE;
      }
}




function ajout_nouveau($con, $password, $email) {
    
        // Requête pour récupérer le nom et le mot de passe des différents utilisateurs
      $sql3= "INSERT INTO `client` (`id`, `nom`, `prenom`, `dossier`, `rendez-vous`, `courriel`, `mot_de_passe`) VALUES
(5, 'NULL', 'NULL', 'reservations', 'rendez vous',  '$email', '$password')";
      if(mysqli_query($con, $sql3)){
        return TRUE;
      }
     

    }


    function ajout_nouveau_lien_admin($con, $cv) {
    
        // Requête pour récupérer le nom et le mot de passe des différents utilisateurs
      $sql3= "INSERT INTO `coach` (`id`, `nom`, `prenom`, `categorie`, `cv`,`dossier`,`courriel`, `mot_de_passe`) VALUES
(5, 'NULL', 'NULL', 'reservations', '$cv',  'NULL', 'NULL','NULL')";
      if(mysqli_query($con, $sql3)){
        return TRUE;
      }
    }