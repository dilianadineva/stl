<?php include 'App/View/Layout/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card mt-5 shadow-sm">
            <div class="card-header text-center bg-primary text-white">
                <h4>Вход за администратори</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?controller=Auth&action=login">
                    <div class="mb-3">
                        <label for="username" class="form-label">Потребителско име</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Парола</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Вход</button>
                </form>
            </div>
        </div>
    </div>
</div>

