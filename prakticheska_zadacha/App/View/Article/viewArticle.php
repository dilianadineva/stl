<?php include 'App/View/Layout/header.php'; ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php?controller=Article&action=index" class="btn btn-primary text-white">← Обратно към статиите</a>
    </div>
    
    <h2 class="card-title text-center mb-4"><?= htmlspecialchars($article['title']) ?></h2>
    <?php if (!empty($article['image']) && file_exists("public/uploads/" . $article['image'])): ?>
        <div class="text-center mb-4">
            <img src="public/uploads/<?= htmlspecialchars($article['image']) ?>" 
                 class="img-thumbnail" 
                 alt="Article Image" 
                 style="max-width: 400px;">
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="article-content">
                <?= $article['content'] ?>
            </div>
        </div>
    </div>
</div>
