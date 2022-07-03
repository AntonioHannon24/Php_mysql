<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Logout</title>
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
            
          echo msg_sucesso(' Você foi desconectado com sucesso!!');


          echo voltar();
        logout();
        ?>
    </section>
</body>
</html>