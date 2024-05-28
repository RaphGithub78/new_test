<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Voici la presentation</h1>



<?php

//identifier le nom de base de données 
$database = "sportifs"; 
 
//connectez-vous dans votre BDD 
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
 $db_handle = mysqli_connect('localhost', 'root', '' ); 
 $db_found = mysqli_select_db($db_handle, $database); 
 
    //si le BDD existe, faire le traitement 
 if ($db_found) { 
     $sql = "SELECT * FROM profils_sportifs"; 
     $result = mysqli_query($db_handle, $sql); 
     while ($data = mysqli_fetch_assoc($result)) { 
         echo "ID: " . $data['id'] . "<br>"; 
         echo "Nom:" . $data['nom'] . "<br>"; 
         echo "Prénom: " . $data['prenom'] . "<br>"; 
         echo "categorie: " . $data['categorie'] . "<br>"; 
         echo "cv: " . $data['cv'] . "<br>"; 
         echo "photo_profil: " . $data['photo_profil'] . "<br>"; 
     $image = $data['photo_profil']; 
       echo "<img src='$image' height='80' width='100'>" . "<br>"; 
 
     }//end while 
      
 }//end if 
//si le BDD n'existe pas 
 else { 
     echo "Database not found"; 
 }//end else 
 
//fermer la connection 
mysqli_close($db_handle); 
?>
</body>
</html>
