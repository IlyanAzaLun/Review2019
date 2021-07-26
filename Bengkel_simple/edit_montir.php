<?php
require_once('connect.php');

function rowMontir($dbc = null)
{
	$query = "select nama, nomor_hp, alamat, gaji, id from montir where id = {$_GET['id']}";
	$result = @mysqli_query($dbc, $query);
	$row = mysqli_fetch_row($result);
	return $row;
}
if(isset($_POST['submit'])){
	if(!empty($_POST['nama']) && !empty($_POST['gaji'])){

		// echo $_POST['nama'] ." ". $_POST['gaji'];
		$nama = trim($_POST['nama']);
		$nomor_hp = trim($_POST['nomor_hp']);
		$alamat = trim($_POST['alamat']);
		$gaji = trim($_POST['gaji']);
		$id = trim($_POST['id']);
		$query = "update montir set nama = ?, nomor_hp = ?, alamat = ?, gaji = ? where id = {$id}";
		$statement = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($statement, "sssd", $nama, $nomor_hp, $alamat, $gaji);
		mysqli_stmt_execute($statement);
		$affected_row = mysqli_stmt_affected_rows($statement);
		if($affected_row == 1){
			header("Location: http://localhost/bengkel/montir.php");
			die();
		}else{
			echo "error terjadi " . mysqli_error();
			$row = rowMontir($dbc);
		}
	}else{
		echo "Field nama dan gaji wajib diisi";
	}
}else{
	// $query = "select nama, nomor_hp, alamat, gaji, id from montir where id = {$_GET['id']}";
	// $result = @mysqli_query($dbc, $query);
	// $row = mysqli_fetch_row($result);
	$row = rowMontir($dbc);
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Selamat datang di Bengkel</title>
	<link rel="stylesheet" href="<?php echo $base_url?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url?>assets/css/main.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo $base_url?>">System Bengkel</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<?php if(isset($_SESSION['username'])){?>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>customer.php">Customer</a></li>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>montir.php">Montir</a></li>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>logout.php">Logout</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
	<div class ="connect">
		<div class="container">
			<form action="http://localhost/bengkel/edit_montir.php?id=<?php echo $_GET['id']?>" method="post">
				<div class="form-group">
				<p>Nama</p>
				<p><input type="text" class="form-control" name="nama" id="nama" size="30" value="<?php echo $row[0];?>"></p>
				</div>
				<div class="form-group">
				<p>Nomor HP</p>	
				<p><input type="text" class="form-control" name="nomor_hp" id="nomor_hp" size="30" value="<?php echo $row[1];?>"></p>
				</div>
				<div class="form-group">
				<p>Alamat</p>
				<p><textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?php echo $row[2];?></textarea></p>
				</div>
				<div class="form-group">
				<p>Gaji</p>
				<p><input type="text" class="form-control" name="gaji" id="gaji" size="30" value="<?php echo $row[3];?>"></p>
				</div>
				<p><input type="hidden" name="id" id="id" class="form-control" size="30" value="<?php echo $row[4];?>"></p>
				<p><input type="submit" name="submit" value="Simpan" class="form-control"></p>
			</form>
		</div>
	</div>	
	
</body>
</html>