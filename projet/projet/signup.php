<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Sportify</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="signup_process.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <!-- Ajoutez d'autres champs selon vos besoins -->
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
    </div>
</body>
</html>
