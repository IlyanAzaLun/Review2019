<?php
    require_once "../.controller/config.php";
    require "../.assets/libs/vendor/autoload.php";
	
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	// // Generate a version 4 (random) UUID object
	// $uuid4 = Uuid::uuid4();
	// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
	if (isset($_POST['add'])) {
		$uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $id_anggota = trim(mysqli_real_escape_string($con, $_POST['id_anggota']));
		$id_petugas = trim(mysqli_real_escape_string($con, $_POST['id_petugas']));
		$id_buku = trim(mysqli_real_escape_string($con, $_POST['id_buku']));
		$tgl_pinjam = trim(mysqli_real_escape_string($con, $_POST['tgl_pinjam']));
        $tgl_kembali = trim(mysqli_real_escape_string($con, $_POST['tgl_hrs_kembali']));
        $query = "INSERT INTO tbl_report (id, id_book, id_petugas, id_anggota, tanggal_peminjaman, tanggal_kembali)VALUES('$uuid', '$id_buku', '$id_petugas', '$id_anggota', '$tgl_pinjam', '$tgl_kembali');";
        mysqli_query($con, $query) or die (mysqli_error($con));
        // echo"<script>window.location='index.php';</script>";
	// }else if (isset($_POST['edit'])) {
 //        $kd_pinjam = $_POST['kd_pinjam'];
 //        $tgl_kembali = trim(mysqli_real_escape_string($con, $_POST['tgl_kembali']));
	// 	$denda = trim(mysqli_real_escape_string($con, $_POST['denda']));
	// 	mysqli_query($con, "UPDATE tbl_report SET tanggal_kembali = '$tgl_kembali', tot_denda = '$denda' WHERE id = '$kd_pinjam'") or die (mysqli_error($con));
	// 	echo"<script>window.location='index.php';</script>";
	// }else {
 //        $kd_pinjam = $_GET['kd_pinjam'];
 //        $sql = mysqli_query($con, "DELETE FROM tbl_report WHERE id = '$kd_pinjam'") or die(mysqli_error($con));
 //        // mysqli_query($con, $query) or die (mysqli_error($con));
 //        if ($con -> multi_query($sql)) {
 //            echo"<script>window.location='index.php';</script>";
 //        } while ($con -> next_result());
 //        $con -> close();
    }
    ?>