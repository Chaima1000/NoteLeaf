<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $user_id]);

header("Location: dashboard.php");
?>
