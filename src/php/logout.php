<?php
    //Inicia a sessão
    session_start();
    //Apaga/encerra todas as variáveis existentes
    session_unset();
    //Encerra a sessão existente
    session_destroy();
    echo "<h3>Sua sessão foi encerrada</h3>";
    //2 segundos após pressionada, dedireciona o usuário à página principal localizada duas pastas acima da atual.
    header("Refresh: 2, URL = ../../");
?>