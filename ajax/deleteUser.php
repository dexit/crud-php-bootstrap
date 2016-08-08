<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $id_cliente = $_POST['id'];

    // delete User
    $query = "DELETE FROM clientes WHERE id_cliente = '$id_cliente'";

    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>
