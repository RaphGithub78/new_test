<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte Utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: normal;
        }
    </style>
</head>
<body>
<button onclick="window.location.href = 'services.html';">Revenir à l'accuiel</button>
    <div class="container">
        <h1>Mon Compte Utilisateur</h1>
        <table>
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
            <?php
            //identifier le nom de base de données 
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
                             WHERE a.mot_de_passe='$password' AND a.courriel='$email')";

                    $result = mysqli_query($db_handle, $sql); 

                    while ($data = mysqli_fetch_assoc($result)) { 
                        echo "<tr>";
                        echo "<td>Nom</td>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Prénom</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Email</td>";
                        echo "<td>" . $data['courriel'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Dossier</td>";
                        echo "<td>" . $data['dossier'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Rendez-vous</td>";
                        echo "<td>01/06/2024</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Mot de passe</td>";
                        echo "<td>" . $data['mot_de_passe'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
           
            ?>
        </table>
    </div>
</body>
</html>
