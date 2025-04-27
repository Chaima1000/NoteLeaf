<?php
session_start();
require 'config/db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Mauvais identifiants.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se Connecter</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Google Font -->
</head>
<body>
    <div class="container">
    <div class="logo-container"></div>

        <h2>Se connecter</h2>

        <?php if (isset($error)) echo "<p class='error' style='color: red; text-align: center;'>$error</p>"; ?>

        <form method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary">Se connecter</button>

            <p class="text-center">
                <a href="register.php" style="color: #6B8D77; text-decoration: none;">Créer un compte</a>
            </p>
        </form>
    </div>

    <div class="footer">
        &copy; 2025 Noteleaf🌿 by Chaima MRABET🌸
    </div>
</body>
</html>

