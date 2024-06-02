<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Sportify</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            color: #555;
        }
        p a {
            color: #007BFF;
            text-decoration: none;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
            <input type="text" id="titre" name="titre" style="display: none;">
        </form>
        <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a></p>
    </div>
        <?php 
require 'donne_debut.php';
$con = connexion();


    
 $database = "liste_comptes"; 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $password = $_POST['password'];
     $email = $_POST['email'];

     //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
     $db_handle = mysqli_connect('localhost', 'root', '' ); 
     $db_found = mysqli_select_db($db_handle, $database); 

     if(analyse_connection($con, $password, $email)==1){
            session_start();
            $_SESSION['email']=$email;
           
            header("Location:compte_client.php");
           exit();     

         }
         else if(analyse_connection($con, $password, $email)==2){
            session_start();
            $_SESSION['email']=$email;
           
            header("Location:compte_coach.php");            

         }
         else if(analyse_connection($con, $password, $email)==3){
            session_start();
            $_SESSION['email']=$email;
           
            header("Location:compte_administrateur.php");            

         }
         else{
             echo("email ou mot de passe non valide, Réessayer");   

         }
    
    }
?>
</body>
</html>
