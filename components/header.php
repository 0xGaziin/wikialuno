<?php
session_start();
?>

<nav>
    <a href="./index.php" title="Ir para a página de início">Início</a>
    <a href="./log.php" title="Criar uma conta nova">Cadastro</a>
    <a href="./log.php" title="Entrar em uma conta pré-existente">Login</a>
    <a href="./courses.php" title="Ver os cursos disponíveis na página">Cursos</a>
    <?php if (isset($_SESSION['user_logged']) && isset($_SESSION['user_id'])) : ?>
        <a href="./perfil.php?id=<?php echo $_SESSION['user_id'] ?>" title="Ver o seu perfil">Meu Perfil</a>
    <?php endif; ?>
</nav>

<header>
    <h1>Seu conhecimento, planejado.</h1>
</header>