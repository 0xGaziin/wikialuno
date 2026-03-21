<?php
require_once __DIR__ . '/database/database.php';
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

try {
    $query = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:n, :e, :p)');
    $query->execute([
        ':n' => $name,
        ':e' => $email,
        ':p' => $password
    ]);
    
    $searchId = $pdo->prepare('SELECT id FROM users WHERE email = :e');
    $searchId->execute([
        ':e' => $email
    ]);

    $fetchUser = $searchId->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user_logged'] = true;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_id'] = $fetchUser['id'];
} catch (PDOException $e) {
    die('Algo deu errado: ' . $e->getMessage());
}
?>