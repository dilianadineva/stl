<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Практическа Задача</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if (!empty($_SESSION['authenticated'])): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
            <a class="navbar-brand" href="index.php?controller=Article&action=index">Статии</a>
            <div class="ms-auto">
                <a href="index.php?controller=Auth&action=logout" class="btn btn-outline-light">Изход</a>
            </div>
        </nav>
    <?php endif; ?>

    <div class="container mt-4">