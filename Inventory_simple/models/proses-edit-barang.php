<?php 
ob_start();
require_once('../config/conn.php');
require_once('../models/database.php');
include('../models/m_barang.php');

$connection = new Database($host, $user, $pass, $dbnm);
$brg        = new Barang($connection);

$id_brg     = $_POST['id_brg'];
$nama_brg   = $connection->conn->real_escape_string($_POST['nama_brg']);
$harga_brg  = $connection->conn->real_escape_string($_POST['harga_brg']);
$stok_brg   = $connection->conn->real_escape_string($_POST['stok_brg']);
$detail_brg   = $connection->conn->real_escape_string($_POST['detail_brg']);

$pict       = $_FILES['gbr_brg']['name'];
$extensi    = explode(".", $_FILES['gbr_brg']['name']);
$gbr_brg    = 'brg-'.round(microtime(true)).'.'.end($extensi);
$sumber     = $_FILES['gbr_brg']['tmp_name'];

if ($pict == '') {
	$brg->edit("UPDATE tb_barang SET nama_brg = '$nama_brg', harga_brg = '$harga_brg', stok_brg = '$stok_brg', detail_brg = '$detail_brg' WHERE id_brg = '$id_brg'");
}else{
	$gbr_awal = $brg->tampil($id_brg)->fetch_object()->gbr_brg;
	unlink("../assets/img/barang/".$gbr_awal);

	$upload   = move_uploaded_file($sumber, "../assets/img/barang/".$gbr_brg);
	if ($upload) {
		$brg->edit("UPDATE tb_barang SET nama_brg = '$nama_brg', harga_brg = '$harga_brg', stok_brg = '$stok_brg', detail_brg = '$detail_brg', gbr_brg = '$gbr_brg' WHERE id_brg = '$id_brg'");
	}else{
		echo "<script>alert('Upload Gagal!');</script>";
	}
		
}echo"<script>window.location ='?page=barang';</script>";
?>