<?php

session_start();

$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

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