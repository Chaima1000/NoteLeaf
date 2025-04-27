<?php
$host = "localhost";  // Hôte (localhost si en local)
$dbname = "note";     // Nom de ta base de données
$user = "root";       // Utilisateur MySQL
$pass = "";           // Mot de passe de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur connexion: " . $e->getMessage());
}
?>
