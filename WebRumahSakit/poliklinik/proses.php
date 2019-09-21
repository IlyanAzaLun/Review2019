<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";
	
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	// // Generate a version 4 (random) UUID object
	// $uuid4 = Uuid::uuid4();
	// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
	if (isset($_POST['add'])) {
		$total = $_POST['total'];
		for ($i=1; $i <=$total  ; $i++) { 
			$uuid = Uuid::uuid4()->toString();
			$nama = trim(mysqli_real_escape_string($con, $_POST['nama-'.$i]));
			$gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-'.$i]));
			$sql = mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli, gedung)VALUES('$uuid','$nama','$gedung')") or die (mysqli_error($con));
		}
		if ($sql) {
			echo"<script>alert('".$total." data berhasil di tambahkan');window.location='data.php';</script>";
		}else{
			echo"<script>alert('".$total." data gagal di tambahkan, coba lagi');window.location='generate.php';</script>";
		}
	}else if (isset($_POST['edit'])) {
		for ($i=0; $i < count($_POST['id']); $i++) { 
			$id = $_POST['id'][$i];
			$nama = $_POST['nama'][$i];
			$gedung = $_POST['gedung'][$i];
			$sql = mysqli_query($con, "UPDATE tb_poliklinik SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'") or die (mysqli_error($con));
		}echo"<script>alert('data berhasil di update');window.location='data.php';</script>";
	}
    ?>