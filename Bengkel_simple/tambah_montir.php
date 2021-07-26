<?php
require_once('connect.php');
if(isset($_POST['submit'])){
	if(!empty($_POST['nama']) && !empty($_POST['gaji'])){

		// echo $_POST['nama'] ." ". $_POST['gaji'];
		$nama = trim($_POST['nama']);
		$nomor_hp = trim($_POST['nomor_hp']);
		$alamat = trim($_POST['alamat']);
		$gaji = trim($_POST['gaji']);
		$query = "insert into montir(nama, nomor_hp, alamat, gaji) values (?, ?, ?, ?)";

		$statement = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($statement, "sssd", $nama, $nomor_hp, $alamat, $gaji);

		mysqli_stmt_execute($statement);
		$affected_row = mysqli_stmt_affected_rows($statement);
		
		if($affected_row == 1){
			header("Location: http://localhost/bengkel/montir.php");
			die();
		}else{
			echo "error terjadi " . mysqli_error();
		}
	}else{
		echo "Field nama dan gaji wajib diisi";
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
			<form action="http://localhost/bengkel/tambah_montir.php" method="post">
				<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" id="nama" size="30">
				</div>
				<div class="form-group">
				<label>Nomor HP</label>	
				<input type="text" class="form-control" name="nomor_hp" id="nomor_hp" size="30">
				</div>
				<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
				<label>Gaji</label>
				<input type="text" class="form-control" name="gaji" id="gaji" size="30">
				</div>
				<button class="form-control" type="submit" name="submit" value="Simpan">Simpan</button>
			</form>

		</div>
	</div>	
	
	<script src="<?php $base_url?>assets/js/jequery.min.js"></script>
	<script src="<?php $base_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?php $base_url?>assets/js/feather.min.js"></script>
	<script src="<?php $base_url?>assets/js/main.js"></script>

</body>
</html>


