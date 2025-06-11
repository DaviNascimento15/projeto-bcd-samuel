<!DOCTYPE html>
<html lang="pt-br">
<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "local_flix";

    // Criar conexão
    $conexao = new mysqli($servidor, $usuario, $senha, $nomeBanco);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <title>Cadastro - Local Flix</title>
</head>
<body>
    <div class="container">
        <p class="title">☆ CADASTRO ☆</p>
        <img src="./src/AOT.png" alt="Tema AoT" />
        <form class="loginForm" method="POST" action="">
            <div class="formGroup">
                <label for="userName">Nome Completo</label>
                <input type="text" name="userName" class="loginInput" required />
            </div>
            <div class="formGroup">
                <label for="userPhone">Telefone/Celular</label>
                <input type="text" name="userPhone" class="loginInput" required />
            </div>
            <div class="formGroup">
                <label for="userEmail">Email</label>
                <input type="email" name="userEmail" class="loginInput" required />
            </div>
            <div class="formGroup">
                <label for="userPassword">Senha</label>
                <input type="password" name="userPassword" class="passInput" required />
            </div>
            <div class="formGroup">
                <label for="userCpf">CPF</label>
                <input type="text" name="userCpf" class="loginInput" required />
            </div>
            <div class="formGroup">
                <label for="userBirth">Data de Nascimento</label>
                <input type="date" name="userBirth" class="loginInput" required />
            </div>
            <input class="loginBtn" type="submit" name="enviar" value="Cadastrar" />
            <p>Já possui uma conta? <a href="./src/login.php">Clique aqui para fazer login.</a></p>
        </form>

        <?php
        if (isset($_POST['enviar'])) {
            // Receber dados do formulário
            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            $userCpf = $_POST['userCpf'];
            $userPhone = $_POST['userPhone'];
            $userBirth = $_POST['userBirth'];

            // Verificar campos vazios (ainda tem required no HTML, mas aqui por segurança)
            if (!$userName || !$userEmail || !$userPassword || !$userCpf || !$userPhone || !$userBirth) {
                echo "<p style='color:red;'>Todos os campos são obrigatórios.</p>";
            } else {
                // Preparar a query segura
                $stmt = $conexao->prepare("INSERT INTO usuarios (userName, userEmail, userPassword
, userCpf, userPhone, userBirth) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $userName, $userEmail, $userPassword, $userCpf, $userPhone, $userBirth);

                if ($stmt->execute()) {
                    echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
                } else {
                    echo "<p style='color:red;'>Erro ao cadastrar usuário: " . $stmt->error . "</p>";
                }

                $stmt->close();
            }
        }

        $conexao->close();
        ?>
    </div>
</body>
</html>
