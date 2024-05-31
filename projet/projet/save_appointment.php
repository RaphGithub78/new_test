<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=agenda_db', 'root', '');

// Récupération des données du rendez-vous, y compris l'adresse e-mail
$date = $_POST['date'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];
$email = $_POST['email']; // Récupération de l'adresse e-mail

// Préparation de la requête SQL avec l'adresse e-mail
$query = "INSERT INTO appointments (date, start_time, end_time, email) VALUES (:date, :start_time, :end_time, :email)";
$statement = $pdo->prepare($query);

// Exécution de la requête avec l'adresse e-mail
$result = $statement->execute([
    'date' => $date,
    'start_time' => $startTime,
    'end_time' => $endTime,
    'email' => $email // Ajout de l'adresse e-mail dans les valeurs à insérer
]);

// Vérification de l'enregistrement
if ($result) {
    // Enregistrement réussi, renvoyer une réponse JSON
    echo json_encode(['success' => true, 'message' => 'La réservation a été enregistrée avec succès.']);
} else {
    // Erreur lors de l'enregistrement, renvoyer une réponse JSON avec un message d'erreur
    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement de la réservation.']);
}
?>
