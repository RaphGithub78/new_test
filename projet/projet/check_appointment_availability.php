<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda_db";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données POST
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $date = $data->date;
    $start_time = $data->start_time;
    $end_time = $data->end_time;

    // Requête SQL pour vérifier la disponibilité du créneau
    $sql = "SELECT * FROM appointments WHERE date = '$date' AND ((start_time <= '$start_time' AND end_time > '$start_time') OR (start_time < '$end_time' AND end_time >= '$end_time'))";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Le créneau est déjà réservé
        echo json_encode(["available" => false]);
    } else {
        // Le créneau est disponible
        echo json_encode(["available" => true]);
    }
} else {
    // Aucune donnée reçue
    echo json_encode(["error" => "Aucune donnée reçue"]);
}

$conn->close();
?>
