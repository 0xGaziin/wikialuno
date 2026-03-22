<?php
require_once __DIR__ . '/src/database/database.php';

$queryListCourses = $pdo->prepare('SELECT id, nameCourse, description FROM courses');
$queryListCourses->execute();
$courses = $queryListCourses->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages/courses.css">
    <title>Cursos | WikiAluno</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main class="container">
        <section class="courses-grid">
            <?php foreach($courses as $course) : ?>
                <article class="course-card">
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($course['nameCourse']) ?></h3>
                        <p><?php echo htmlspecialchars($course['description']) ?></p>
                    </div>
                    <a href="./details.php?view=<?php echo $course['id'] ?>" class="btn-view">
                        Veja Mais
                    </a>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <footer class="main-footer">
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer>   
</body>
</html>