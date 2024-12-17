<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="formulario">
        <h1>Login</h1>
        <form method="post">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <input type="submit" name="acao" value="Fazer Login">
            <input type="submit" name="acao" value="Cadastrar">
        </form>

    </div>

    <!-- Lógica -->
    <?php
    include("conexao.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Verifica se foi feito login ou cadastro
        if ($_POST['acao'] == 'Fazer Login') {
            $result = $mysql->query("SELECT id FROM users WHERE name = '$user' AND password = '$senha'");

            if ($result->num_rows > 0) {
                echo "Login feito com sucesso!";
                header("Location: home.html");
                exit();
            } else {
                echo "<script>alert('Usuário ou senha inválidos!');</script>";
            }
        }

        if ($_POST['acao'] == 'Cadastrar') {
            $mysql->query("INSERT INTO users (name, password) VALUES ('$user', '$senha')");
            echo "<script>alert('Usuário cadastrado!');</script>";
        }

    }
    ?>
</body>

</html>