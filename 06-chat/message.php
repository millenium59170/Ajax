<?php

// Connexion é la BD
$db = new PDO('mysql:host=localhost;dbname=tchat;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    
    ]);

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        $pseudo = $_POST['pseudo'];
        $message = $_POST['message'];
        // date('Y-m-d');
        $date = (new DateTime())->format('Y-m-d H:i:s');
    
        // On ajoute le message en BDD
        $query = $db->prepare('INSERT INTO `message` (`pseudo`, `date`, `message`) VALUES (:pseudo, :date, :message)');
        $query->bindValue(':pseudo', $pseudo);
        $query->bindValue(':message', $message);
        $query->bindValue(':date', $date);
        $query->execute();


        //on renvoi le message en JSON
        echo json_encode([
            'pseudo' => $pseudo,
            'message' => $message,
            'date' => $date
        ]);
    }
    