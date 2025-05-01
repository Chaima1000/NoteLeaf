<?php
$host = getenv('DB_HOST');  // Get the host from environment variable (set to 'db' in docker-compose)
$dbname = getenv('MYSQL_DATABASE');  // Get the database name from environment variable
$user = getenv('MYSQL_USER');  // Get the MySQL username from environment variable
$pass = getenv('MYSQL_PASSWORD');  // Get the MySQL password from environment variable

try {
    // Use PDO to connect to MySQL with the provided credentials
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";  // Test message for successful connection
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
