<?php

// Connexion é la BD
$db = new PDO('mysql:host=localhost;dbname=smartphone;charset=utf8', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

]);

// on recupere les smartphones
/**
 * Apple iphone XS 1490
 * Apple iphone XR 1390
 * Apple iphone X 1190
 * Apple iphone 8 990
 * Samsung Galaxy S10 890
 * samsung Galaxy S9 790
 * 
 * a chaque execution du fichier on pourra TRUNCATE la table pour eviter les doublons
 */

$smartphones = 
[
    [
        "brand" => "Apple",
        "model" => "Iphone XS",
        "price" => 1490,  
    ],
    [
        "brand" => "Apple",
        "model" => "Iphone XR",
        "price" => 1390,  
    ],
    [
        "brand" => "Apple",
        "model" => "Iphone X",
        "price" => 1190,  
    ],
    [
        "brand" => "Apple",
        "model" => "Iphone 8",
        "price" => 990,  
    ],
    [
        "brand" => "Samsung",
        "model" => "Galaxy S10",
        "price" => 890,  
    ],
    [
        "brand" => "Samsung",
        "model" => "Galaxy S9",
        "price" => 790,  
    ],
];

// On reset la table
$db->query('TRUNCATE TABLE smartphone');

// On prépare la requête
$query = $db->prepare('INSERT INTO smartphone (brand, model, price) VALUES(:brand, :model, :price)');

// On exécute 6 requêtes
foreach ($smartphones as $smartphone) {
$query->bindValue(':brand', $smartphone['brand']);
$query->bindValue(':model', $smartphone['model']);
$query->bindValue(':price', $smartphone['price']);
$query->execute();

}