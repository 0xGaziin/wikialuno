<?php
session_start();
require_once __DIR__ . '/src/database/database.php';

if (!isset($_SESSION['user_logged'])) {
    header('Location: ./log.php');
    exit();
}

$stmt = $pdo->prepare("SELECT aboutMe FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/edit-profile.css">
    <title>Editar Perfil | WikiAluno</title>
</head>
<body>
    <?php include './components/header.php' ?>
    
    <main class="edit-profile-main">
        <section class="edit-container">
            <header class="section-header">
                <h2>Bio do Perfil</h2>
                <p>Conte sua história. O Markdown é seu aliado aqui.</p>
            </header>

            <form action="./src/change-profile.php" method="post" class="edit-form">
                <div class="field-wrapper">
                    <label for="description">Sobre Mim</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        placeholder='Uma descrição sua.'
                    ><?php echo htmlspecialchars($user['aboutMe'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                
                <div class="actions">
                    <button type="submit" class="btn-save">Atualizar Perfil</button>
                    <a href="./perfil.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn-link">Voltar</a>
                </div>
            </form>
        </section>
    </main>

    <?php include './components/footer.php' ?>
</body>
</html>