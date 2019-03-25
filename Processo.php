<?php

// chama função de mensagens
session_start();

//limpa as variáveis e deixa sem 'value' ao carregar a página
$id = 0;
$name = '';
$sex = '';
$company = '';
$function = '';
$update = false;


$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

// tratamento para se o botar "salvar" for selecionado, referenciar a ID e salvar do banco de dados
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $company = $_POST['company'];
    $function = $_POST['function'];

    
    $mysqli->query("INSERT INTO dados (nome, sexo, empresa, funcao) VALUES ('$name', '$sex', '$company', '$function')") or
        die($mysqli->error);

        
        $_SESSION['message'] = "Dados inseridos com sucesso!";
        $_SESSION['msg_type'] = "success";

        header("location: crud.php");

}


// tratamento para se o botar "deletar" for selecionado, referenciar a ID e excluir do banco de dados
if (isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $mysqli->query("DELETE FROM dados WHERE id=$id") or die($mysqli->error());

        $_SESSION['message'] = "Dados deletados com sucesso!";
        $_SESSION['msg_type'] = "danger";

        header("location: crud.php");
}


// tratamento para se o botar "editar" for selecionado, referenciar a ID e seleciona do banco de dados
 if (isset($_GET['editar'])){
    $id = $_GET['editar'];
    //troca o valor de 'update' para addionar na mesma linha da alteração
    $update = true;
    //add os valores em suas variáveis
    $result = $mysqli->query("SELECT * FROM dados WHERE id=$id") or die($mysqli->error());

    //verifica se o resultado contem ao menos uma linha e imprime nos campos os valores buscados pela id em "dados"
    if ($result && @count($result) == 1){
        $row = $result->fetch_array();
        $name = $row['nome'];
        $sex = $row['sexo'];
        $company = $row['empresa'];
        $function = $row['funcao'];
    }
}
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $company = $_POST['company'];
    $function = $_POST['function'];

    $mysqli->query("UPDATE dados SET nome='$name', sexo='$sex', empresa='$company', funcao='$function' WHERE id=$id") or die ($msqui->error());

    $_SESSION['message'] = "Dados alterados com sucesso!";
    $_SESSION['msg_type'] = "warning";

    header("location: crud.php");
}



