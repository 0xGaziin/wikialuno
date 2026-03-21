<?php
require_once __DIR__ . '/database/database.php';
session_start();

if (!isset($_SESSION['user_logged'])) {
    header('../log.php');
    exit();    
}

try {
    $description = $_POST['description'];
    
    $querySetDescription = $pdo->prepare('UPDATE users SET aboutMe = :d WHERE id = :i');
    $querySetDescription->execute([
        ':d' => $description,
        ':i' => $_SESSION['user_id']
    ]);

    $userId = $_SESSION['user_id'];

    header("Location: ../perfil.php?id=$userId");
    exit();
} catch(PDOException $e) {
    die('Algo deu errado.' . $e->getMessage());
}
?>