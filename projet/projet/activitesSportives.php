<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site PHP</title>
   <style type="text/css"> 
.wrapper{
    background-color: beige;
    padding: 10px;
}
.header{
    text-align: center;
    padding: 5px;
}
.navbar{
 background:darkred;
 margin: 10px;
}
.nav-link{
 color: #fff;
 cursor: pointer;
}
.nav-link {
 margin-right: 1em !important;
}
.nav-link:hover {
 color: #000;
}
.navbar-collapse {
 display: flex;
 justify-content: center;
 align-items: center;
}
.content{
    padding: 10px;
    text-align: center;
    height: 600px;
}
.content p{
    font-size: 1.3rem;
    line-height: 1.5;
    margin-left: 20%;
    margin-right: 20%;
}
.content img{
    width: 500px;
    padding: 10px;
    margin-bottom: 5px;
}
.footer-copyright {
 color: #666;
 padding: 40px 0;
}
.page-footer {
 background-color: #222;
 color: #ccc;
 padding: 60px 0 30px;
}
</style>
</head>
<body>

<h1>Activités Sportives</h1>

<?php  
// Identifier le nom de la base de données
$database = "sportify";

// Connectez-vous à la BDD
// Serveur = localhost | Login = root | Mot de passe = ''
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Si la BDD existe, faire le traitement
if ($db_found) {
    // Sélectionnez l'activité spécifique, par exemple, musculation
    $activite = 'musculation';
    $sql = "SELECT * FROM coach WHERE specialite='$activite'";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        echo "<div class='coach'>";
        echo "<h2>Coach pour l'activité : " . ucfirst($activite) . "</h2>";
        echo "<p>Nom : " . $data['nom'] . "</p>";
        echo "<p>Prénom : " . $data['prenom'] . "</p>";
        echo "<p>Bureau : " . $data['bureau'] . "</p>";
        echo "<p>Téléphone : " . $data['telephone'] . "</p>";
        echo "<p>Courriel : " . $data['courriel'] . "</p>";
        echo "<p>Jours de travail : " . $data['jours_travail'] . "</p>";

        $image = $data['photo_profil'];
        echo "<img src='$image' alt='Photo du coach' height='80' width='100'>";
        echo "</div><br>";
    }
} else {
    echo "Database not found";
}

// Fermer la connexion
mysqli_close($db_handle);
?>
</body>
</html>
