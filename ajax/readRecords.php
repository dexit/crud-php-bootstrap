<?php
	// include Database connection file
	include("db_connection.php");

	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID Cliente</th>
							<th>Código</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Ações</th>
						</tr>';

	$query = "SELECT * FROM clientes";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td width="10%">'.$row['id_cliente'].'</td>
				<td width="10%">'.$row['codigo'].'</td>
				<td width="30%">'.$row['nome'].'</td>
				<td width="30%">'.$row['email'].'</td>
				<td width="20%">
				<button onclick="GetUserDetails('.$row['id_cliente'].')" class="btn btn-warning">Update</button>
				<button onclick="DeleteUser('.$row['id_cliente'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>
