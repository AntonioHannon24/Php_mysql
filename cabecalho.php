<?php

echo "<header>";


if(empty($_SESSION['user'])){
    echo "<a href='user-login.php'>Entrar</a>";
}else{
    echo "Olá, <strong> " .  $_SESSION['user'] ."</strong> |";
    echo " <a href='user-edit.php'>Meus dados </a>|";
    if(is_admin()){ // verifica se é admin ou editor!!
        echo " <a href='user-new.php'>Novo usuário</a> |";
        echo " Novo jogo |";
    }
    echo "<a href='user-logout.php'> Sair</a> ";
}

 

echo "</header>";



?>
