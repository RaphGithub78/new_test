<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=agenda_db', 'root', '');

// Récupération des données du rendez-vous
$date = $_POST['date'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];

// Préparation de la requête SQL
$query = "INSERT INTO appointments (date, start_time, end_time) VALUES (:date, :start_time, :end_time)";
$statement = $pdo->prepare($query);

// Exécution de la requête
$result = $statement->execute([
    'date' => $date,
    'start_time' => $startTime,
    'end_time' => $endTime
]);

if ($result) {
    // Enregistrement réussi
    echo json_encode(['success' => true]);
} else {
    // Erreur lors de l'enregistrement
    echo json_encode(['success' => false]);
}
?>
