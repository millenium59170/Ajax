<?php
sleep(1);
// Connexion é la BD
$db = new PDO('mysql:host=localhost;dbname=smartphone;charset=utf8', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

]);

// on recupere les smartphones en associatif

$sql = 'SELECT * FROM smartphone';
$query = $db->query($sql);
$smartphones = $query->fetchAll(PDO::FETCH_ASSOC);





//Transformer le tableau en JSON (json_encode)
header('Content-Type: application/json');
echo json_encode($smartphones); 

?>