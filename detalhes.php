<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Detalhes</title>
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
            require_once "cabecalho.php";
        
            $c =$_GET['cod'] ?? 0; // pegando codigo da url, se nao conseguir nenhum dado, recebe 0
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
            if(!$busca){
                echo "<tr><td>Busca falhou!</td></tr>";
            }else{
                if($busca->num_rows == 1){
                
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);

                    echo" <tr><td rowspan='4'><img src='$t' class='full'/>";
                    
                    echo"<td><h2>$reg->nome</h2></td>";
                    echo "<tr>
                        <td>Nota: $reg->nota/10</td>
                    </tr> ";

                    if(is_admin()){
                        echo "<td><i class='material-icons'>add_circle</i>
                        <i class='material-icons'>edit</i>
                        <i class='material-icons'>delete</i>";
                    }elseif(is_editor()){
                        echo "<td> <i class='material-icons'>edit</i>";
                    }

                    echo"<tr><td>$reg->descricao</td></tr>";
                    echo"<tr><td>Admin</td></tr>";
                }else{
                    echo "<tr><td>Nenhum registro foi encontrado!</td></tr>";
                }
            }
         

            ?>
        </table>
        <?php  
            echo voltar();
        ?>
    </section>
    <?php require_once "rodape.php" ?>
    
</body>
</html>