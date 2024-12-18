<?php
require_once __DIR__ . '../../Models/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $acao = $_POST['acao'];

    if ($acao === 'Fazer Login') {
        $query = "SELECT id FROM users WHERE name = '$usuario' AND password = '$senha'";
        $result = $mysql->query($query);

        if ($result->num_rows > 0) {
            header('Location: /login-php/app/Views/home.php');
            exit;
        } else {
            echo "<script>
                alert('Usuário ou senha inválidos!');
                window.location.href = '/login-php/app/Views/login.php';
            </script>";
            exit;
        }        
    } elseif ($acao === 'Cadastrar') {
        $query = "INSERT INTO users (name, password) VALUES ('$usuario', '$senha')";
        if ($mysql->query($query)) {
            echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        }
    }
}
?>