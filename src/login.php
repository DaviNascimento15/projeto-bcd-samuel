<?php
    // Inicia a sessão
    session_start();

    // Importa o arquivo conexao.php (assumindo que está em src/php/conexao.php e este arquivo login.php está em src/)
    include(__DIR__ . '/php/conexao.php');

    // Verifica se a variável "user" está armazenando algum dado
    if(isset($_SESSION['user'])){
        // Redireciona o usuário à página home.php
        header("Location: ../home.php");
        exit(); // Sempre usar exit após redirecionamento
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../src/css/style.css">
    </head>
    <body>
        <!-- Caixa que representa o fundo da pagina e armazena todo o conteúdo -->
        <div class="fundo"> 
            <!-- Caixa que armazena o(s) formulário(s) -->
            <div class="caixa-formulario"> 
                <!-- Formulário de Login -->
                <form class="area-formulario" method="post" action="#"> 
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                    
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="********" required>
                    
                    <input type="submit" value="Entrar" id="login" name="login">

                    <p>Não possui uma conta? <a href="../index.php">Clique aqui!</a></p>
                </form>
                <!-- Fim do formulário de Login -->
            </div>
            <!-- Fim da div "caixa-formulario" -->
        </div>
        <!-- Fim da div "fundo" -->
        
        <?php
            // Verifica se o botão de login foi clicado
            if(isset($_POST["login"])){
                include(__DIR__ . '/php/login.php');
            }
        ?>
    </body>
</html>
