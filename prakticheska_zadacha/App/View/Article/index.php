<?php include 'App/View/Layout/header.php'; ?>
<div class="container mt-4">
    <a href="index.php?controller=Article&action=create" class="btn btn-primary mb-3">Създаване на нова статия</a>
    <hr>
    <h2>Всички статии</h2>

    <?php
    $grouped = [];

    foreach ($articles as $article) {
        $firstLetter = mb_strtoupper(mb_substr($article['title'], 0, 1));
        $grouped[$firstLetter][] = $article;
    }

    ksort($grouped);

    foreach ($grouped as $letter => $articlesForLetter): ?>
        <div class="mb-4">
            <h4 class="bg-light p-2 border-start border-5 border-primary"><?= $letter ?></h4>
            <div class="row g-3">
                <?php foreach ($articlesForLetter as $article): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <?php if (!empty($article['image']) && file_exists("public/uploads/" . $article['image'])): ?>
                                <img src="public/uploads/<?= htmlspecialchars($article['image']) ?>"
                                     class="card-img-top object-fit-contain"
                                     alt="Article Image"
                                     style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= htmlspecialchars($article['title']) ?></h5>
                                <div class="card-text">
                                    <?= $article['content'] ?> <!-- HTML shown as-is -->
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="index.php?controller=Article&action=view&id=<?= $article['id'] ?>" class="btn btn-sm btn-primary text-white">View</a>
                                <a href="index.php?controller=Article&action=edit&id=<?= $article['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?controller=Article&action=delete&id=<?= $article['id'] ?>" onclick="return confirm('Изтрий статията?')" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
