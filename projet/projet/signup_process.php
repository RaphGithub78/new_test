<!DOCTYPE html>
<html>
<head>
    <style>
        button {
            background-color: #4CAF50; /* Vert */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Vert foncé */
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <button type="button" onclick="window.location.href = 'login.php';" title="ok">revenir pour se connecter</button>

    <?php 
    require 'donne_debut.php';

    $con = connexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(analyse_connection($con, $password, $email) == -1){
            if(ajout_nouveau($con, $password, $email) == TRUE){
                echo "Bien inscrit";
             //   header('Location: login.php');
                exit();
            }
            else{
                echo "Problème lors de l'ajout du nouvel utilisateur.";
            }
        } else {
            echo "Réessayez, identifiants déjà existants.";
            header('Location: signup.php');
            exit();
        }
    } else {
        echo "Méthode de requête non valide.";
    }
    ?>
</body>
</html>
