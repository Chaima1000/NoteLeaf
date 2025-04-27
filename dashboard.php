<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ?");
$stmt->execute([$user_id]);
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Notes</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Google Font -->
</head>
<body>
    <div class="container">
    <div class="logo-container1"></div>

        <h2>Mes Notes</h2>

        <div style="text-align:center; margin-bottom: 20px;">
            <a href="add_note.php" style="background-color: #6B8D77; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; margin-right: 10px;">+ Ajouter une note</a>
            <a href="logout.php" style="background-color:rgb(218, 116, 136); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Déconnexion</a>
        </div>

        <ul>
            <?php foreach ($notes as $note): ?>
                <li class="note-card">
                    <h3><?= htmlspecialchars($note['title']) ?></h3>
                    <p><?= nl2br(htmlspecialchars($note['content'])) ?></p>
                    <div style="margin-top: 10px;">
                        <a href="edit_note.php?id=<?= $note['id'] ?>">Modifier</a> | 
                        <a href="delete_note.php?id=<?= $note['id'] ?>">Supprimer</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="footer">
        &copy; 2025 Noteleaf🌿 by Chaima MRABET🌸
    </div>
</body>
</html>

