<?php
require_once __DIR__ . '/src/database/database.php';

$courseId = $_GET['view'];

$queryCourse = $pdo->prepare('SELECT * FROM courses WHERE id = :c');
$queryCourse->execute([
    ':c' => $courseId
]);
$fetchCourseDetails = $queryCourse->fetch(PDO::FETCH_ASSOC);

if (!$fetchCourseDetails) { die('Curso não encontrado'); }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>
        <?php echo $fetchCourseDetails['nameCourse'] ?>
    </title>
</head>
<body>
    <?php include './components/header.php' ?>
    <main>
        <section class='without-background'>
            <h2><?php echo $fetchCourseDetails['nameCourse'] ?></h2>
            <p><?php echo $fetchCourseDetails['description']?></p>
        </section>

        <section>
            <h2>Descrições</h2>
            <p>
                <span class='bold'>Categoria: </span>
                <?php echo $fetchCourseDetails['idCategory'] ?> <!-- *Change for text -->
            </p>

            <p>
                <span class='bold'>Carga Horária: </span>
                <?php echo $fetchCourseDetails['workload'] ?> horas.
            </p>
        </section>
    </main>
    <?php include './components/footer.php' ?>
</body>
</html>