<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site PHP</title>
    <link rel="stylesheet" href="styles.css">
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
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
            font-size: 1.2em;
            color: #555;
        }
        input[type="text"] {
            width: 250px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        input[type="text"]::placeholder {
            color: #999;
            font-style: italic;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            margin-left: 10px;
        }
        button:hover {
            background-color: #0056b3;
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
    <div class="container">
        <h1>Recherchez ce qu'il vous faut</h1>

        <form method="get" action="Resultat_recherche.php">
            <label for="titre">Champ :</label>
            <input type="text" id="titre" name="titre" placeholder="Entrez un nom, prénom, catégorie...">
            <button type="submit">Rechercher</button>
        </form>
        
    </div>

    <button onclick="window.location.href = 'index.html';">Acceuil</button>
</body>
</html>
