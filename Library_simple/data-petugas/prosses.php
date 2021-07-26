<?php
    require_once "../.controller/config.php";
    require "../.assets/libs/vendor/autoload.php";
	
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	// // Generate a version 4 (random) UUID object
	// $uuid4 = Uuid::uuid4();
	// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
	if (isset($_POST['add'])) {
		$uuid = Uuid::uuid4()->toString();
		$nm_petugas = trim(mysqli_real_escape_string($con, $_POST['nm_petugas']));
		$jk_petugas = trim(mysqli_real_escape_string($con, $_POST['jk_petugas']));
		$pw_petugas = trim(mysqli_real_escape_string($con, $_POST['pw_petugas']));
		$jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
		$shift = trim(mysqli_real_escape_string($con, $_POST['shift']));
		$tl_petugas = trim(mysqli_real_escape_string($con, $_POST['tl_petugas']));
		$al_petugas = trim(mysqli_real_escape_string($con, $_POST['al_petugas']));
		mysqli_query($con, "INSERT INTO tbl_petugas (id_petugas, nm_petugas, jk_petugas, pw_petugas, jabatan, shift, tl_petugas, al_petugas)VALUES('$uuid', '$nm_petugas', '$jk_petugas', '$pw_petugas', '$jabatan', '$shift', '$tl_petugas', '$al_petugas')") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else if (isset($_POST['edit'])) {
		$id_petugas = $_POST['id_petugas'];
		$nm_petugas = trim(mysqli_real_escape_string($con, $_POST['nm_petugas']));
		$jk_petugas = trim(mysqli_real_escape_string($con, $_POST['jk_petugas']));
		$tl_petugas = trim(mysqli_real_escape_string($con, $_POST['tl_petugas']));
		$jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
		$shift = trim(mysqli_real_escape_string($con, $_POST['shift']));
		$al_petugas = trim(mysqli_real_escape_string($con, $_POST['al_petugas']));
		mysqli_query($con, "UPDATE tbl_petugas SET nm_petugas = '$nm_petugas', jk_petugas = '$jk_petugas', jabatan = '$jabatan', shift = '$shift', tl_petugas = '$tl_petugas', al_petugas = '$al_petugas' WHERE id_petugas = '$id_petugas'") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else {
        $id_petugas = $_GET['id_petugas'];
        $sql = mysqli_query($con, "DELETE FROM tbl_petugas WHERE id_petugas = '$id_petugas'") or die(mysqli_error($con));
        echo"<script>window.location='index.php';</script>";
    }
    ?>