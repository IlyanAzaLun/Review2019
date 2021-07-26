<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";
	
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	// // Generate a version 4 (random) UUID object
	// $uuid4 = Uuid::uuid4();
	// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
	if (isset($_POST['add'])) {
		$uuid = Uuid::uuid4()->toString();
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
		$ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
		mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat)VALUES('$uuid','$nama','$ket')") or die (mysqli_error($con));
		echo"<script>window.location='data.php';</script>";
	}else if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
		$ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
		mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") or die (mysqli_error($con));
		echo"<script>window.location='data.php';</script>";
	}
    ?>