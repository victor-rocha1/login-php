<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Login</title>
</head>

<body>
    <div class="formulario">
        <h1>Login</h1>
        <form method="post" action="/login">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <input type="submit" name="acao" value="Fazer Login">
            <input type="submit" name="acao" value="Cadastrar">
        </form>
    </div>
</body>

</html>