<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Novo usuário</title>
</head>
<body>
    <?php
        require_once "includes/login.php";
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <head>

    </head>
    <section>
        <?php
            if(!is_admin()){
                echo msg_erro('AREA RESTRITA!! Você não é administrador');


            }else{
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2){
                        if(empty($usuario) ||empty($nome) ||empty($senha1) ||empty($senha2) || empty($tipo) ){

                            echo msg_erro('Todos os campos são obrigatorios!!');

                        }else{
                            $senha = gerarHash($senha1);
                            $q = " INSERT INTO usuarios (usuario,nome,senha,tipo) values ('$usuario' ,'$nome','$senha','$tipo') ";
                            if($banco->query($q)){
                                echo msg_sucesso('Usuário '. $usuario .  ' cadastrado com sucesso!!!');
                            }else{
                              echo  msg_erro('Não foi possivel incluir o usuário!! repita o processo');
                            }
                        }



                     
                    }else{
                       echo msg_erro('As senhas não conferem!! repita o processo');
                    }

                }
               
            }
            echo voltar();

        ?>


    </section>
    <?php require_once "rodape.php"  ?>
</body>
</html>