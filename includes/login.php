<?php

session_start();



function logout(){
    session_unset();
}


if(!isset($_SESSION['user'])){

    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = ""; 

}

function cripto($senha){
    $c = '';
    for ($pos = 0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos]) + 1; // pega a senha exemplo admin e coloca uma letra para frente Ex benjo / funcao ord() transforma as letras em numeros
       $c .=chr($letra); // funcao chr  altera de numeros para letras
    }
    return $c;
}

function gerarHash($senha){ // gera senha com hash criptografada
    $txt = cripto($senha);
    $hash = password_hash($txt,PASSWORD_DEFAULT);
    return $hash;
}
function testarHash($senha,$hash){ // verifica se a senha esta correta
    $ok = password_verify(cripto($senha), $hash);
    return $ok;


}
function is_logado(){// verifica se tem usuarios logados
    if(empty($_SESSION['user'])){
        return false;
    }else{
        return true;
    }
}
function is_admin(){// verifica se o usuario é admin
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }else{
        if($t == 'admin'){
            return true;
        }else{
            return false;
        }
    }
}
function is_editor(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }else{
        if($t == 'editor'){
            return true;
        }else{
            return false;
        }
    }
}


?>