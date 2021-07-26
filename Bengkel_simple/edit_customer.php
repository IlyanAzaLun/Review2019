<?php
require_once('connect.php');

function rowcustomer($dbc = null)
{
	$query = "select nama, nomor_hp, alamat, tipe_motor, plat_nomor, id from customer where id = {$_GET['id']}";
	$result = @mysqli_query($dbc, $query);
	$row = mysqli_fetch_row($result);
	return $row;
}
if(isset($_POST['submit'])){
	if(!empty($_POST['nama']) && !empty($_POST['tipe_motor']) && !empty($_POST['plat_nomor'])){

		// echo $_POST['nama'] ." ". $_POST['tipe_motor']." ". $_POST['plat_nomor'];
		$nama = trim($_POST['nama']);
		$nomor_hp = trim($_POST['nomor_hp']);
		$alamat = trim($_POST['alamat']);
		$tipe_motor = trim($_POST['tipe_motor']);
		$plat_nomor = trim($_POST['plat_nomor']);
		$id = trim($_POST['id']);
		$query = "update customer set nama = ?, nomor_hp = ?, alamat = ?, tipe_motor = ?, plat_nomor = ? where id = {$id}";
		$statement = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($statement, "sssss", $nama, $nomor_hp, $alamat, $tipe_motor, $plat_nomor);
		mysqli_stmt_execute($statement);
		$affected_row = mysqli_stmt_affected_rows($statement);
		if($affected_row == 1){
			header("Location: http://localhost/bengkel/customer.php");
			die();
		}else{
			echo "error terjadi " . mysqli_error();
			$row = rowcustomer($dbc);
		}
	}else{
		echo "Field nama tipe_motor dan plat_nomor wajib diisi";
	}
}else{
	// $query = "select nama, nomor_hp, alamat, tipe_motor, plat_nomor, id from customer where id = {$_GET['id']}";
	// $result = @mysqli_query($dbc, $query);
	// $row = mysqli_fetch_row($result);
	$row = rowcustomer($dbc);
	
	print_r($row);
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
			<form action="http://localhost/bengkel/edit_customer.php?id=<?php echo $_GET['id']?>" method="post">
				<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" id="nama" size="30" value="<?php echo $row[0];?>">
				</div>
				<div class="form-group">
				<label>Nomor HP</label>
				<input type="text" class="form-control" name="nomor_hp" id="nomor_hp" size="30" value="<?php echo $row[1];?>">
				</div>
				<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"><?php echo $row[2];?></textarea>
				</div>
				<div class="form-group">
				<label>Tipe Motor</label>
				<select name="tipe_motor" class="form-control" id="tipe_motor">
					<option value="">Pilih Satu</option>
					<option value="Bebek"<?php echo $row[3] == "Bebek" ? "selected=selected" : "";?>>Bebek</option>
					<option value="Trail"<?php echo $row[3] == "Trail" ? "selected=selected" : "";?>>Trail</option>
					<option value="Vespa"<?php echo $row[3] == "Vespa" ? "selected=selected" : "";?>>Vespa</option>
					<option value="Moge" <?php echo $row[3] == "Moge"  ? "selected=selected" : "";?>>Moge</option>
					</select>
				</div>
				<div class="form-group">
				<label>Plat Nomor</label>
				<input class="form-control" type="text" name="plat_nomor" id="plat_nomor" size="30" value="<?php echo $row[4];?>">
				</div>
				<input type="hidden" name="id" id="id" size="30" value="<?php echo $row[5];?>">
				<button class="form-control" type="submit" name="submit" value="Simpan">Simpan</button>
			</form>

		</div>
	</div>	
	
</body>
</html>
