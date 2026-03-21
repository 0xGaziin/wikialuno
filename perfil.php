<?php
require_once __DIR__ . '/src/database/database.php';
require_once __DIR__ . '/src/utils/Parsedown.php';

session_start();

$parsedown = new Parsedown();

$parsedown->setSafeMode(true);

$queryFetchUser = $pdo->prepare('SELECT id, name, aboutMe FROM users WHERE id = :i');
$queryFetchUser->execute([
    ':i' => $_GET['id']
]);

$listUsers = $queryFetchUser->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/perfil.css">
    <title>Perfil de <?php echo $listUsers['name'] ?></title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main>
        <section>
            <h2>Perfil de @<?php echo $listUsers['name'] ?></h2>
            <p>
                <span class='bold'>Atenção: </span>
                Este perfil é gerado pelo próprio usuário mediante a sua conta. Nós tomamos todas as medidas necessárias em relação a links, mas você ainda deve se prevenir.
            </p>
        </section>
        
        <section class='about-me'>
            <h2>Sobre Mim</h2>

            <?php if ($listUsers['id'] == $_SESSION['user_id']) : ?>
                <small class='observation'>
                    Psiu! Este perfil é seu. Você pode editá-lo a qualquer momento.
                    <a href="./edit-profile.php">Edite o seu sobre mim</a>
                </small>
            <?php endif; ?>

            <section class='description'>
                <p>
                    <?php echo $parsedown->text($listUsers['aboutMe']); ?>
                </p>
            </section>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer> 
</body>
</html>