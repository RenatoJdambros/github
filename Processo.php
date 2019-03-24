<?php

$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $company = $_POST['company'];
    $function = $_POST['function'];

    $mysqli->query("INSERT INTO dados (nome, sexo, empresa, funcao) VALUES ('$name', '$sex', '$company', '$function')") or
        die($mysqli->error);

        echo $name;

}