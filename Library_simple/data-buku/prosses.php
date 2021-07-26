<?php
    require_once "../.controller/config.php";
    require "../.assets/libs/vendor/autoload.php";
	
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	// // Generate a version 4 (random) UUID object
	// $uuid4 = Uuid::uuid4();
	// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
	function tahun($tgl){
		$tanggal = substr($tgl, 8, 2);
		$bulan = substr($tgl, 5, 2);
		$tahun = substr($tgl, 0, 4);
		return $tahun;
	}
	if (isset($_POST['add'])) {
		$uuid = Uuid::uuid4()->toString();
		$date = DateTime::createFromFormat("d-m-Y", $_POST['thn_tb_buku']);
		$jdl_buku = trim(mysqli_real_escape_string($con, $_POST['jdl_buku']));
		$pns_buku = trim(mysqli_real_escape_string($con, $_POST['pns_buku']));
		$pnb_buku = trim(mysqli_real_escape_string($con, $_POST['pnb_buku']));
		$thn_tb_buku = tahun($_POST['thn_tb_buku']);
		$no_rk_buku = trim(mysqli_real_escape_string($con, $_POST['no_rk_buku']));
		mysqli_query($con, "INSERT INTO tbl_buku (id_buku, jdl_buku, pns_buku, pnb_buku, thn_tb_buku, no_rk_buku)VALUES('$uuid', '$jdl_buku', '$pns_buku', '$pnb_buku', '$thn_tb_buku', '$no_rk_buku')") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else if (isset($_POST['edit'])) {
		$id_buku = $_POST['id_buku'];
		$jdl_buku = trim(mysqli_real_escape_string($con, $_POST['jdl_buku']));
		$pns_buku = trim(mysqli_real_escape_string($con, $_POST['pns_buku']));
		$no_rk_buku = trim(mysqli_real_escape_string($con, $_POST['no_rk_buku']));
		$pnb_buku = trim(mysqli_real_escape_string($con, $_POST['pnb_buku']));
		$thn_tb_buku = tahun($_POST['thn_tb_buku']);
		mysqli_query($con, "UPDATE tbl_buku SET jdl_buku = '$jdl_buku', pns_buku = '$pns_buku', pnb_buku = '$pnb_buku', thn_tb_buku = '$thn_tb_buku', no_rk_buku = '$no_rk_buku' WHERE id_buku = '$id_buku'") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else {
        $id_buku = $_GET['id_buku'];
        $sql = mysqli_query($con, "DELETE FROM tbl_buku WHERE id_buku = '$id_buku'") or die(mysqli_error($con));
        echo"<script>window.location='index.php';</script>";
    }
    ?>