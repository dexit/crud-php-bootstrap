<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];

    $nome = $_POST['nome'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$sexo = $_POST['sexo'];
		$observacao = $_POST['observacao'];

    // Updaste User details
    $query = "UPDATE clientes SET nome = '$nome', email = '$email', rg = '$rg', cpf = '$cpf', telefone = '$telefone', celular = '$celular', sexo = '$sexo', observacao = '$observacao'  WHERE id_cliente = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
