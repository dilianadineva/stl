<?php
class AuthController {
    public function __construct($mysqli = null) {
        //simple login provided for now
    }
   public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

             // Strip HTML tags and trim spaces
            $usernameRaw = $_POST['username'] ?? '';
            $username = trim(strip_tags($usernameRaw));
            
            $password = $_POST['password'] ?? '';

            // Validate input
            if (empty($username) || empty($password)) {
                echo 'Моля, попълнете и двете полета.';
                return;
            }

            // Simulate stored user data (in real apps: fetch from DB)
            $storedUsername = 'admin';
            $storedPasswordHash = password_hash('admin', PASSWORD_DEFAULT); // Normally stored in DB

            // Secure password check
            if ($username === $storedUsername && password_verify($password, $storedPasswordHash)) {
                session_regenerate_id(true); // Prevent session fixation
                $_SESSION['authenticated'] = $username;

                header('Location: index.php?controller=Article&action=index');
                exit;
            } else {
                echo 'Невалидни данни за достъп.';
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
