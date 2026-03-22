<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WikiAluno - Plataforma de aprendizado e organização para desenvolvedores.">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/index.css">
    <title>WikiAluno | Evolução Constante</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main>
        <section class="hero-section">
            <h1>Seu conhecimento, planejado.</h1>
            <p>A plataforma feita para organizar seus estudos de programação e impulsionar sua carreira técnica.</p>
        </section>

        <div class='main-information-section'>
            <article class="info-card">
                <h2>Organize seu aprendizado</h2>
                <p>
                    Centralize conteúdos de programação e infraestrutura para impulsionar sua formação com projetos reais e foco total no mercado de trabalho.
                </p>
            </article>
    
            <article class="info-card">
                <h2>Equilíbrio acadêmico</h2>
                <p>
                    O alto desempenho nasce do bem-estar. Acesse recursos para gerenciar o estresse, organizar rotinas e garantir sua saúde mental.
                </p>
            </article>
        </div>

        <section class='courses-cta'>
            <h2>Conheça nossos cursos</h2>
            <p>Trilhas de aprendizado pensadas do iniciante ao avançado.</p>
            <a href="./courses.php" class="btn-primary">Ver todos os cursos</a>
        </section>
    </main>

    <?php include './components/footer.php' ?>
</body>
</html>