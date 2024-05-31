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


    
 $database = "liste_comptes"; 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $password = $_POST['password'];
     $email = $_POST['email'];

     //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
     $db_handle = mysqli_connect('localhost', 'root', '' ); 
     $db_found = mysqli_select_db($db_handle, $database); 

     if($db_found){
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


         $result = mysqli_query($db_handle, $sql); 
         if ($data = mysqli_fetch_assoc($result)){
           header("Location:compte_onglet.php");
           exit();     

         }
         else{
             echo("email ou mot de passe non valide, Réessayer");   

         }
        }
    }
?>
</body>
</html>
