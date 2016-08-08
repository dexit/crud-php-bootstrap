<?php
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']))
	{
		include("db_connection.php");

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$sexo = $_POST['sexo'];
		$observacao = $_POST['observacao'];

		// NECESSITA DE ID_CLIENTE E CODIGO  - serao automaticos?

		$query = "INSERT INTO clientes(nome, email, rg, cpf, telefone, celular, sexo, observacao) VALUES('$nome', '$email', '$rg', '$cpf', '$telefone', '$celular', '$sexo', '$observacao')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "Salvo com sucesso!";
	} else {
  	echo "Erro ao incluir!";

	}
?>
