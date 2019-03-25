    <!doctype html>
    <html lang="pt-br">
    <head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS--> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Cadastro</title>
    
</head>
    <body>
        <!--Chama informações-->
     <?php require_once 'Processo.php'; ?>

     <!--Se a sessão é iniciada, configura a mensagem a ser exibita-->
     <?php
    if (isset($_SESSION['message'])):?>

    <!--Bootstap na chamada de mensagem-->
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php 

    echo $_SESSION['message'];
    unset(($_SESSION)['message']);

    ?>

    </div>
    <?php endif ?>


         <div class="container">
     <?php 
        //acessa banco de dados e seleciona informações do banco "dados" ou informa erro
        $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM dados") or die ($mysqli->error);
        //pre_r($result);
        ?>


<div align="center" class="p-3 mb-3 bg-primary text-white">INFORME SEUS DADOS</div>

        <?php

        //tratamento das variáveis do banco de dados
        function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
         ?>
    <!--formulário com bootstrap e metodo POST -->
    <div class="row justify-content-center">
   
   <form action="Processo.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group"> 
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Digite seu nome">
    </div>  
    <div class="form-group"> 
    <label>Sexo:</label>
    <input type="text" name="sex" class="form-control" value="<?php echo $sex ?>" placeholder="Digite seu sexo">
    </div>
    <div class="form-group"> 
    <label>Empresa:</label>
    <input type="text" name="company" class="form-control" value="<?php echo $company ?>" placeholder="Digite sua empresa">
    </div>
    <div class="form-group"> 
    <label>Função:</label>
    <input type="text" name="function" class="form-control" value="<?php echo $function ?>" placeholder="Digite sua função">
    </div>
    <div class="form-group"> 
    <!--Verifica se a variável 'update' esta com valor true, indicando que se trata de uma alteração -->
    <?php 
    if ($update == true): ?> 
     <button type="submit" name="update" class="btn btn-info">Atualizar</button>
    <?php 
    else: ?>
    <button type="submit" name="save" class="btn btn-primary container">Salvar</button>
    <?php endif; ?>
    </div>
    <button type="submit" name="registros" class="btn btn-info container">ir para registros</button>
   

   </form>
</div>
</div>

   

    <!--Optional JavaScript-->  
    <!--jQuery first, then Popper.js, then Bootstrap JS-->  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
    </html>