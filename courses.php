<?php
require_once __DIR__ . '/src/database/database.php';

$queryListCourses = $pdo->prepare('SELECT * FROM courses');
$queryListCourses->execute();

$courses = $queryListCourses->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Cursos</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main>
        <section>
            <h2>Cursos Disponíveis</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias mollitia ad sapiente saepe magni aliquam voluptatum cum voluptates totam eaque aperiam, consequatur maxime laudantium dolorum quasi libero commodi magnam eius.
            </p>
        </section>

        <section>
            <?php foreach($courses as $course) : ?>
                <h2> <?php echo $course['nameCourse'] ?> </h2>
                <p> <?php echo $course['description'] ?> </p>
            <?php endforeach; ?>
            <a href="http://" target="_blank">Veja Mais</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer>   
</body>
</html>