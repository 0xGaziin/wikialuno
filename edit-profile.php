<?php
session_start();
require_once __DIR__ . '/src/database/database.php';

if (!isset($_SESSION['user_logged'])) {
    header('Location: ./log.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Editar o Sobre Mim</title>
</head>
<body>
    <?php include './components/header.php' ?>
    
    <form action="./src/change-profile.php" method="post">
        <textarea name="description" placeholder='Digite o seu sobre mim'></textarea>
        <button type="submit">Enviar</button>
    </form>

    <?php include './components/footer.php' ?>
</body>
</html>