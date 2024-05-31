<?php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'nom_de_votre_base_de_donnees';
$user = 'nom_utilisateur';
$pass = 'mot_de_passe';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare('DELETE FROM appointments WHERE date = ? AND start_time = ? AND end_time = ? AND email = ?');
    $stmt->bind_param('ssss', $date, $start_time, $end_time, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Aucun rendez-vous correspondant trouvé ou vous n\'êtes pas autorisé à le supprimer']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
}

$mysqli->close();
?>
