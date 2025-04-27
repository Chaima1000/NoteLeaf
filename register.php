<?php
require 'config/db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

    try {
        $stmt->execute([$username, $password]);
        header("Location: index.php");
    } catch (PDOException $e) {
        $error = "Nom d'utilisateur déjà utilisé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <title>Créer un Compte</title>
    
    
    
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Google Font -->
</head>
<body>
    <div class="container">

         <div class="logo-container"></div>
        <h2>Créer un Compte</h2>

        <?php if (isset($error)) echo "<p class='error' style='color: red; text-align: center;'>$error</p>"; ?>

        <form method="POST" class="register-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>

            <button type="submit" name="register" class="btn btn-primary">S'inscrire</button>

            <p class="text-center">
                <a href="index.php" style="color: #6B8D77; text-decoration: none;">Déjà un compte ? Se connecter</a>
            </p>
        </form>
    </div>

    <div class="footer">
        &copy; 2025 Noteleaf🌿 by Chaima MRABET🌸
    </div>
</body>
</html>

