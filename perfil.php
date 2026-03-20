<?php
require_once __DIR__ . '/src/database/database.php';
$queryFetchUser = $pdo->prepare('SELECT id, name FROM users WHERE id = :i');
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
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit repellendus eos amet exercitationem asperiores ea sint quo aliquid voluptate iure. Consectetur quas, fuga impedit perferendis adipisci neque illum deleniti amet.
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer> 
</body>
</html>