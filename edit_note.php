<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config/db.php';

if (!isset($_GET['id'])) {
    die('Note ID not specified.');
}

$id = (int)$_GET['id'];

// Fetch the note to edit
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$note) {
    die('Note not found.');
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title && $content) {
        $stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Both title and content are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Note</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Google Font -->
</head>
<body>
    <div class="container">
    <div class="logo-container3"></div>

        <h2>Modifier la Note</h2>

        <form method="POST" class="note-form">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($note['title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="content">Contenu:</label>
                <textarea id="content" name="content" rows="5" class="form-control" required><?= htmlspecialchars($note['content']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour la Note</button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="dashboard.php" style="background-color: rgb(218, 116, 136); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Retour au Dashboard</a>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 Noteleaf🌿 by Chaima MRABET🌸
    </div>
</body>
</html>

