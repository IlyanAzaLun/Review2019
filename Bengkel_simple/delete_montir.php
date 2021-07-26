<?php
require_once('connect.php');
$id = trim($_GET['id']);
$query = "delete from montir where id = ?";
$statement = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($statement, "i", $id);
mysqli_stmt_execute($statement);
$affected_row = mysqli_stmt_affected_rows($statement);
if($affected_row == 1){
	header("Location: http://localhost/bengkel/montir.php");
	die();
}else{
	echo "error terjadi " . mysqli_error();
}
?>
