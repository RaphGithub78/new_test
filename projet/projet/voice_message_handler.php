<?php

// Répertoire d'enregistrement des fichiers audio
$uploadDirectory = 'uploads/';

// Vérifier si le répertoire d'enregistrement existe, sinon le créer
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// Vérifiez si le fichier audio est envoyé
if (isset($_POST['audio'])) {
    $audio = $_POST['audio'];
    $author = 'Anonymous'; 
    $audio = str_replace('data:audio/wav;base64,', '', $audio);
    $audio = str_replace(' ', '+', $audio);
    $audioData = base64_decode($audio);

    $fileName = 'audio_' . time() . '.wav';
    $filePath = $uploadDirectory . $fileName;
    file_put_contents($filePath, $audioData);

    $query = $db->prepare('INSERT INTO voice_messages SET author = :author, file_path = :file_path, created_at = NOW()');
    $query->execute([
        'author' => $author,
        'file_path' => $filePath
    ]);

    // Retourner un message de succès
    echo json_encode(["status" => "success", "message" => "Message vocal envoyé avec succès."]);
} else {
    // Retourner un message d'erreur
    echo json_encode(["status" => "error", "message" => "Aucune donnée audio reçue."]);
}
