<?php
$request = $_SERVER['REQUEST_URI'];

$request = str_replace('/projeto-login-php/public', '', $request);

switch ($request) {
    case '/':
        require_once __DIR__ . '/../app/Views/login.php';
        break;

    case '/login':
        require_once __DIR__ . '/../app/Views/login.php';
        break;

    case '/auth':
        require_once __DIR__ . '/../app/Controllers/AuthController.php';
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}