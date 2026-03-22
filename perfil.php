<?php
require_once __DIR__ . '/src/database/database.php';
require_once __DIR__ . '/src/utils/Parsedown.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$parsedown = new Parsedown();
$parsedown->setSafeMode(true);

$queryFetchUser = $pdo->prepare('SELECT id, name, aboutMe FROM users WHERE id = :i');
$queryFetchUser->execute([':i' => $_GET['id']]);
$listUsers = $queryFetchUser->fetch(PDO::FETCH_ASSOC);

if (!$listUsers) { 
    header("Location: index.php");
    exit;
}

$isOwner = isset($_SESSION['user_id']) && $listUsers['id'] == $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Perfil de <?php echo htmlspecialchars($listUsers['name']); ?> no WikiAluno. Confira seus cursos e trajetória.">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/perfil.css">
    <title><?php echo htmlspecialchars($listUsers['name']) ?> | WikiAluno</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main class="profile-container">
        <aside class="profile-sidebar">
            <div class="profile-header-card">
                <div class="avatar-placeholder"><?php echo strtoupper(substr($listUsers['name'], 0, 1)); ?></div>
                <h1>@<?php echo htmlspecialchars($listUsers['name'], ENT_QUOTES, 'UTF-8') ?></h1>
                <p class="warning-box">
                    <strong>Nota:</strong> Perfil gerado pelo usuário. Verifique links externos antes de acessar.
                </p>
                <?php if ($isOwner) : ?>
                    <a href="./edit-profile.php" class="btn-edit">Editar Perfil</a>
                <?php endif; ?>
            </div>
        </aside>

        <div class="profile-content">
            <article class="content-section">
                <h2>Sobre Mim</h2>
                <div class="markdown-body">
                    <?php 
                        $aboutText = $listUsers['aboutMe'] ?: "Este usuário ainda não escreveu nada por aqui...";
                        echo $parsedown->text($aboutText); 
                    ?>
                </div>
            </article>

            <section class="content-section"> <!-- Example -->
                <h2>Cursos em Andamento</h2>
                <div class="course-grid">
                    <div class="course-mini-card">
                        <h3>HTML5 e CSS3</h3>
                        <div class="progress-bar"><div class="progress" style="width: 75%"></div></div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include './components/footer.php' ?>
</body>
</html>