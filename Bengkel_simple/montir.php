<?php 

require_once('connect.php');

$query = "select nama, nomor_hp, alamat, gaji, id from montir";
$result = @mysqli_query($dbc, $query);
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
<?php
echo "<a class='btn btn-primary' href='tambah_montir.php'>Tambah Montir</a><br />";

if($result){
	echo "<table class='table'>
		<tr>
			<td>NO</td>
			<td>Nama</td>
			<td>Nomor HP</td>
			<td>Alamat</td>
			<td>Gaji</td>
			<td>Aksi</td>
		</tr>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>
			<td>{$row['id']}</td>
			<td>{$row['nama']}</td>
			<td>{$row['nomor_hp']}</td>
			<td>{$row['alamat']}</td>
			<td>{$row['gaji']}</td>
			<td>
				<a href='http://localhost/bengkel/edit_montir.php?id={$row['id']}'><i data-feather='edit-2'>Edit</i></a>
				<a href='http://localhost/bengkel/delete_montir.php?id={$row['id']}'><i data-feather='trash-2'>Delete</i></a>
			</td>
		</tr>";
	}
	echo "</table>";
}else {
	echo "Data tidak ketemu";
}

?>
		</div>
	</div>	
		
	<script src="<?php $base_url?>assets/js/jequery.min.js"></script>
	<script src="<?php $base_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?php $base_url?>assets/js/feather.min.js"></script>
	<script src="<?php $base_url?>assets/js/main.js"></script>

</body>
</html>

