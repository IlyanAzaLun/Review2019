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
		$nm_anggota = trim(mysqli_real_escape_string($con, $_POST['nm_anggota']));
		$jk_anggota = trim(mysqli_real_escape_string($con, $_POST['jk_anggota']));
		$tl_anggota = trim(mysqli_real_escape_string($con, $_POST['tl_anggota']));
		$al_anggota = trim(mysqli_real_escape_string($con, $_POST['al_anggota']));
		mysqli_query($con, "INSERT INTO tbl_anggota (id_anggota, nm_anggota, jk_anggota, tl_anggota, al_anggota)VALUES('$uuid', '$nm_anggota', '$jk_anggota', '$tl_anggota', '$al_anggota')") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else if (isset($_POST['edit'])) {
		$id_anggota = $_POST['id_anggota'];
		$nm_anggota = trim(mysqli_real_escape_string($con, $_POST['nm_anggota']));
		$jk_anggota = trim(mysqli_real_escape_string($con, $_POST['jk_anggota']));
		$tl_anggota = trim(mysqli_real_escape_string($con, $_POST['tl_anggota']));
		$al_anggota = trim(mysqli_real_escape_string($con, $_POST['al_anggota']));
		mysqli_query($con, "UPDATE tbl_anggota SET nm_anggota = '$nm_anggota', jk_anggota = '$jk_anggota', tl_anggota = '$tl_anggota', al_anggota = '$al_anggota' WHERE id_anggota = '$id_anggota'") or die (mysqli_error($con));
		echo"<script>window.location='index.php';</script>";
	}else {
        $id_anggota = $_GET['id_anggota'];
        $sql = mysqli_query($con, "DELETE FROM tbl_anggota WHERE id_anggota = '$id_anggota'") or die(mysqli_error($con));
        echo"<script>window.location='index.php';</script>";
    }
    ?>