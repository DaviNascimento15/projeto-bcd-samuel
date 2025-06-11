<?php
//Cadastro de pessoas
    //Variáveis que recebem os valores de nome, email, senha e confirmação de senha
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_con = $_POST["password_con"];

    //Verifica se a senha inserida no campo SENHA é a mesma do campo CONFIRMAR SENHA
    if($password == $password_con){
        //Comando para inserir os dados no banco:
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome','$email','$password');";
        
        //Teste a conexão com o banco e realize o envio dos dados.
        if(mysqli_query($conn, $sql)) {
            echo "<p>Usuário cadastrado com sucesso!</p>";
        }else{
            echo "<p>Ocorreu um erro ao tentar cadastrar o usuário.</p>";
        }
    }
    else{
        echo "";
    }
?>