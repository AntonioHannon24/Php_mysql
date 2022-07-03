
<?php

    $banco = new mysqli("localhost","root","","bd_game");//acessando Banco de dados

    if($banco->connect_errno){ // verifica se o banco foi conectado com sucesso, se não para o algoritmo
        echo "<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>";
        die();
    }

    $banco->query("set names 'utf8");
    $banco->query("set character_set_connection=utf8");
    $banco->query("set character_set_client = utf8");
    $banco->query("set character_set_results = utf8");

  









?>
