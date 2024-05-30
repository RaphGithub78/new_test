



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Sportify</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post" action="compte_onglet.php" >
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
            <input type="text" id="titre" name="titre"><br><br>
        </form>
        <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a></p>
    </div>




</body>
</html>
