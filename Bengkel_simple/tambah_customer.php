<?php
require_once('connect.php');

if(isset($_POST['submit'])){
	if(!empty($_POST['nama']) && !empty($_POST['tipe_motor']) && !empty($_POST['plat_nomor'])){

		// echo $_POST['nama'] ." ". $_POST['tipe_motor']." ". $_POST['plat_nomor'];
		$nama = trim($_POST['nama']);
		$nomor_hp = trim($_POST['nomor_hp']);
		$alamat = trim($_POST['alamat']);
		$tipe_motor = trim($_POST['tipe_motor']);
		$plat_nomor = trim($_POST['plat_nomor']);
		
		$query = "insert into customer(nama, nomor_hp, alamat, tipe_motor, plat_nomor) values (?, ?, ?, ?, ?)";

		$statement = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($statement, "sssss", $nama, $nomor_hp, $alamat, $tipe_motor, $plat_nomor);

		mysqli_stmt_execute($statement);
		$affected_row = mysqli_stmt_affected_rows($statement);
		
		if($affected_row == 1){
			header("Location: http://localhost/bengkel/customer.php");
			die();
		}else{
			echo "error terjadi " . mysqli_error();
		}
	}else{
		echo "Field nama tipe motor dan plat nomor wajib diisi";
	}
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
			<form action="http://localhost/bengkel/tambah_customer.php" method="post">
				<div align="right">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class='form-control' name="nama" id="ama" size="30">
					</div>
					<div class="form-group">
						<label>Nomor HP</label>	
						<input type="text" class='form-control' name="nomor_hp" id="nomor_hp" size="30"></p>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class='form-control' id="alamat" cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label>Tipe Motor</label>
						<select class="form-control" name="tipe_motor" id="tipe_motor">
							<option value="">Pilih Satu</option>
							<option value="Bebek">Bebek</option>
							<option value="Trial">Trail</option>
							<option value="Vespa">Vespa</option>
							<option value="Moge">Moge</option>
						</select>
					</div>
					<div class="form-group">
						<label>Plat Nomor</label>
						<input type="text" class='form-control' name="plat_nomor" id="plat_nomor" size="30">
					</div>
					<button type="submit" class='form-control' name="submit" value="Simpan">Simpan</button>
				</div>
			</form>	

		</div>
	</div>	
	
	<script src="<?php $base_url?>assets/js/jequery.min.js"></script>
	<script src="<?php $base_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?php $base_url?>assets/js/feather.min.js"></script>
	<script src="<?php $base_url?>assets/js/main.js"></script>
	
</body>
</html>

