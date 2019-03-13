<?php

// Connexion é la BD
$db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

]);

// on recupere les vehicules
/**
 * 
 * a chaque execution du fichier on pourra TRUNCATE la table pour eviter les doublons
 */

$cars = 
[
    [
        "brand" => "Porsche",
        "model" => "Cayenne S",
        "picture" => "cayenne.png",
        "price" => 119890,  
    ],
    [
        "brand" => "Ford",
        "model" => "Mustang GT",
        "picture" => "mustang.png",
        "price" => 99990,  
    ],
    [
        "brand" => "Dodge",
        "model" => "Charger",
        "picture" => "dodge.png",
        "price" => 109890,  
    ],
    [
        "brand" => "Citroen",
        "model" => "Visa",
        "picture" => "visa.png",
        "price" => 1990,  
    ],
    [
        "brand" => "Dacia",
        "model" => "Logan",
        "picture" => "logan.png",
        "price" => 2890,  
    ],
    [
        "brand" => "Bugatti",
        "model" => "Veyron",
        "picture" => "veron.png",
        "price" => 149790,  
    ],
];

// On reset la table
$db->query('TRUNCATE TABLE cars');

// On prépare la requête
$query = $db->prepare('INSERT INTO cars (brand, model, picture, price) VALUES(:brand, :model, :picture, :price)');

// On exécute 6 requêtes
foreach ($cars as $car) {
$query->bindValue(':brand', $car['brand']);
$query->bindValue(':model', $car['model']);
$query->bindValue(':picture', $car['picture']);
$query->bindValue(':price', $car['price']);
$query->execute();

}