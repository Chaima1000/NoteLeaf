<?php
include 'db.php';  // Inclure la connexion à la base de données

$username = "testuser";  // Nom d'utilisateur
$password = "Test123456";  // Mot de passe

// Hasher le mot de passe avant de le sauvegarder
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    // Insertion de l'utilisateur dans la table `users`
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashed_password]);
    echo "Utilisateur créé avec succès!";
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>
