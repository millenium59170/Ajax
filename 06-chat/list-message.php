<?php

$db = new PDO('mysql:host=localhost;dbname=tchat;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

header('Content-Type: application/json');

// On récupère tous les messages
$messages = $db->query('SELECT * FROM message')->fetchAll();

// On renvoie les messages en json
echo json_encode($messages);
