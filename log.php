<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acesse sua conta no WikiAluno e continue sua jornada.">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/log-user.css">
    <title>Acesso | WikiAluno</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main class="auth-container">
        <section class="auth-card">
            <h2>Crie sua conta</h2>
            <p class="subtitle">Junte-se a centenas de alunos agora.</p>
            <form action="./src/insert-user.php" method='post' class="auth-form">
                <div class="input-group">
                    <label>Nome</label>
                    <input type="text" name='name' placeholder='Como podemos lhe chamar?' required>
                </div>
                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name='email' placeholder='seu@email.com' required>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <input type="password" name='password' placeholder='Crie uma senha forte' required>
                </div>
                <button type="submit" class="btn-auth">Cadastrar</button>
            </form>
            <p class="toggle-text">Já possui uma conta? <a href="#login">Acesse aqui</a></p>
        </section>

        <section id='login' class="auth-card">
            <h2>Bem-vindo de volta</h2>
            <p class="subtitle">Sentimos sua falta por aqui.</p>
            <form action="./src/login-user.php" method='post' class="auth-form">
                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name='email' placeholder='Digite seu e-mail' required>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <input type="password" name='password' placeholder='Digite sua senha' required>
                </div>
                <input type="text" class='invisible-input' aria-hidden="true">
                <button type="submit" class="btn-auth btn-secondary">Entrar</button>
            </form>
            <p class="toggle-text">Não tem conta? <a href="#">Crie uma agora</a></p>
        </section>
    </main>

    <?php include './components/footer.php' ?>
</body>
</html>