<?php
require_once __DIR__ . '/database/database.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

try {
    $searchUser = $pdo->prepare('SELECT * FROM users WHERE email = :e');
    $searchUser->execute([
        ':e' => $email
    ]);
    
    $user = $searchUser->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_logged'] = true;
        $_SESSION['user_name'] = $user['name'];
    } else {
        die('Dados incorretos.');
    }
} catch (PDOException $e) {
    die('Algo deu errado.');
}
?>