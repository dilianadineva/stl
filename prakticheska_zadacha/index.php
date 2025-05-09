<?php
session_start();

require_once 'Config/database.php';

// Get controller/action from URL or set defaults
$controller = ucfirst(strtolower($_GET['controller'] ?? 'auth'));
$action = $_GET['action'] ?? 'login';

// Resolve controller class and file
$controllerFile = "App/Controller/{$controller}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . 'Controller';

    // Instantiate controller with DB connection
    $controllerInstance = new $controllerClass($mysqli);

    //protected контролери за security measures
    $protectedControllers = ['Article']; // add more later
    $isProtected = in_array($controller, $protectedControllers);

    if ($isProtected && empty($_SESSION['authenticated'])) {
        header('Location: index.php?controller=Auth&action=login');
        exit;
    }

    // Execute the requested action
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Action '{$action}' не е намерен в {$controllerClass}.";
    }
} else {
    echo "Контролерът '{$controller}' не е намерен.";
}
