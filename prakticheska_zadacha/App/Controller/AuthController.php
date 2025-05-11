<?php
class AuthController {
    public function __construct($mysqli = null) {
        //simple login provided for now
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username === 'admin' && $password === 'admin') {
                $_SESSION['authenticated'] = 'admin';
                header('Location: index.php?controller=Article&action=index');
                exit;
            } else {
                echo 'Невалидни данни за достъп';
            }
        }
        include 'App/View/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=Auth&action=login');
    }
}
?>
