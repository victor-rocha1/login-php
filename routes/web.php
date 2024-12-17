<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '/login':
        require_once __DIR__ . '/../app/Views/login.php';
        break;

    case '/home':
        require_once __DIR__ . '/../app/Views/home.php';
        break;

    case '/auth':
        require_once __DIR__ . '/../app/Controllers/AuthController.php';
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
?>