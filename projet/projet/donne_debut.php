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
    // Échapper les entrées utilisateur
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $sql1 = "SELECT nom FROM client WHERE email='$email' AND password='$password'";
    $sql2 = "SELECT nom FROM coach WHERE email='$email' AND password='$password'";
    $sql3 = "SELECT nom FROM administrateur WHERE email='$email' AND password='$password'";

    $curseur1 = mysqli_query($con, $sql1);
    $curseur2 = mysqli_query($con, $sql2);
    $curseur3 = mysqli_query($con, $sql3);

    if (!$curseur1 || !$curseur2 || !$curseur3) {
        // Gestion des erreurs de requête
        echo "Erreur de requête: " . mysqli_error($con);
        return -1;
    }

    if (!$curseur1) {
        return 1;
    }
    if (!$curseur2) {
        return 2;
    }
    if (!$curseur3) {
        return 3;
    }

    return 0; // Aucun utilisateur trouvé
}


?>

