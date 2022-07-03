<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Meus dados</title>
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
            if(!is_logado()){
                echo msg_erro("Efetue o <a href='user-login.php'>login</a> para editar seus dados!!" );
            }else{
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $q = "update usuarios set usuario ='$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha1)){
                        echo msg_aviso("senha antiga foi mantida!!");
                    }else{
                        if($senha1 === $senha2){
                            $senha = gerarHash($senha1);
                            $q.= ",senha = '$senha'";
                        }else{
                            echo msg_erro("As senhas não conferem!! a antiga foi mantida");
                        }
                    }
                        $q .= " where usuario = '" .$_SESSION['user'] . "'"; 
                       
                        
                        if($banco->query($q)){
                            echo msg_sucesso(" Usuário editado com sucesso!!");
                            logout();
                            echo msg_aviso("Por segurança, efetue o <a href='user-login.php'>login</a> novamente!!");
                        }else{
                            echo msg_erro(" Não foi possivel atualizar o usuário");
                        }
                }



            }

            


           echo voltar();
        ?>

    </section>
    <?php require_once "rodape.php"  ?>
</body>
</html>