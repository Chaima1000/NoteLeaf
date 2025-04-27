<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $title, $content]);

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Note</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- New font -->
</head>
<body>
    <div class="container">
    <div class="logo-container2"></div>

        <h2>Nouvelle Note</h2>
        
        <form method="post">
            <input type="text" name="title" placeholder="Titre" required>
            <textarea name="content" placeholder="Contenu" required></textarea>
            <button type="submit" name="add">Ajouter</button>
        </form>

        <p style="text-align:center; margin-top:20px;">
            <a href="dashboard.php">← Retour au tableau de bord</a>
        </p>
    </div>

    <div class="footer">
        &copy; 2025 Noteleaf🌿 by Chaima MRABET🌸
    </div>
</body>
</html>
