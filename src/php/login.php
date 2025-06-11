<?php
    //Variáveis que recebem o email e senha inseridos no index.php
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Variável que armazena o código SQL para realizar a pesquisa do email e senha inseridos no formulário.
    $sql = "SELECT email, senha FROM usuarios WHERE email = '$email';";

    //Variável que executa a variável $sql e recebe o valor final.
    $result = mysqli_query($conn, $sql);

    //Variável que recebe o resultado em forma de array, contendo email e senha.
    $login = mysqli_fetch_array($result);

    //Verifica se a variável está nula. Caso seja verdade, então o email inserido não foi encontrado.
    if(is_null($login)){
        echo "<script type='text/javascript'>alert('Conta inexistente');</script>";
    }
    /*Se a variável não estiver nula, ela verificará se a senha inserida corresponde à senha do respectivo email
    no banco de dados.*/
    else{
        //Variáveis que recebem os valores de email e senha do array $login.
        $login_m = $login['email'];
        $login_p = $login['senha'];

        //Verifica se o email e senha inseridos pertencem à conta que foi encontrada no banco de dados.
        if(($login_m == $email) && ($login_p == $password)){
            echo "<script type='text/javascript'>alert('Login realizado.');</script>";
            //Variável de sessão armazenando o email do usuário após confirmar o login.
            $_SESSION['user'] = $login_m;
            //A página é redirecionada à página home.php.
            echo '<script type="text/javascript">window.open("./home.php", "_self"); </script>';
        } 
        //Caso a senha esteja incorreta, será exibido a mensagem de erro abaixo.
        else {
            echo "<script type='text/javascript'>alert('Email ou senha inválido.');</script>";
        }
    }
?>