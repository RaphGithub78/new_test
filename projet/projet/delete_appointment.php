<?php
// delete_appointment.php

// Connectez-vous à la base de données
$dsn = 'mysql:host=localhost;dbname=agenda_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']);
    exit;
}

// Récupérer les données POST
$date = $_POST['date'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];
$email = $_POST['email'];

if (empty($date) || empty($startTime) || empty($endTime) || empty($email)) {
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
    exit;
}

// Supprimer le rendez-vous
try {
    $stmt = $pdo->prepare('DELETE FROM appointments WHERE date = :date AND start_time = :start_time AND end_time = :end_time AND email = :email');
    $stmt->execute([
        ':date' => $date,
        ':start_time' => $startTime,
        ':end_time' => $endTime,
        ':email' => $email
    ]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Rendez-vous supprimé avec succès']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Aucun rendez-vous trouvé à cette date et heure pour cet e-mail']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression du rendez-vous']);
}
?>
