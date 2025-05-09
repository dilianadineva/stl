<?php include 'App/View/Layout/header.php'; ?>
<div class="container mt-4">
    <h1 class="text-center mb-4">
        <?= isset($article) ? 'Редакция на статия' : 'Добавяне на статия'; ?>
    </h1>

    <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="title" class="form-label">Заглавие</label>
            <input type="text" id="title" name="title" class="form-control" placeholder=""
                value="<?= htmlspecialchars($article['title'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Съдържание</label>
            <textarea id="content" name="content" class="form-control" rows="10">
                <?= htmlspecialchars($article['content'] ?? '') ?>
            </textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Добавяне на снимка (по желание)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <?php if (isset($article) && $article['image']): ?>
            <div class="mb-3">
                <p>Снимка на статията:</p>
                <img src="public/uploads/<?= htmlspecialchars($article['image']) ?>"
                    alt="снимка" class="img-thumbnail" width="200">
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                <?= isset($article) ? 'Запази' : 'Добави' ?>
            </button>
        </div>
    </form>
</div>

<!-- TinyMCE script -->
<script src="https://cdn.tiny.cloud/1/fc2aq1zmozbyo6mr91f413l34ekdtvqzrivfa186pyerdxgj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>