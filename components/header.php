<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="main-nav">
    <div class="nav-container">
        <a href="./index.php" class="logo">WikiAluno</a>
        <div class="nav-links">
            <a href="./index.php">Início</a>
            <a href="./courses.php">Cursos</a>
            <?php if (isset($_SESSION['user_logged'])) : ?>
                <a href="./perfil.php?id=<?php echo $_SESSION['user_id'] ?>" class="btn-profile">Meu Perfil</a>
            <?php else : ?>
                <a href="./log.php">Login</a>
                <a href="./log.php" class="btn-signup">Cadastrar</a>
            <?php endif; ?>
        </div>
    </div>
</nav>