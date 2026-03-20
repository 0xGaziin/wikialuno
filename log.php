<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/log-user.css">
    <title>Cadastro</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main>
        <section>
            <h2>Cadastre-se</h2>
            <form action="./src/insert-user.php" method='post'>
                <input type="text" name='name' placeholder='Como podemos lhe chamar?'>
                <input type="email" name='email' placeholder='O seu melhor e-mail'>
                <input type="password" name='password' placeholder='Digite uma senha forte'>
                <button type="submit">Enviar</button>
            </form>
            <p>
                Psiu! Você já possui uma conta? Logue-se ao lado!
            </p>
        </section>

        <section id='login'>
            <h2>Faça o Login</h2>
            <form action="./src/login-user.php" method='post'>
                <input type="email" name='email' placeholder='Digite o seu e-mail'>
                <input type="password" name='password' placeholder='Digite a sua senha'>
                <input type="text" placeholder='Você me achou? Como? Esperto!' class='invisible-input'>
                <button type="submit">Enviar</button>
            </form>
            <p>
                Sem nenhuma conta? Crie uma ao lado!
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer>    
</body>
</html>