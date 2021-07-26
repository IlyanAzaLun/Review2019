<?php
require_once "../_config/config.php";
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang di pilih');window.location='data.php';</script>";
}else{
	foreach($chk as $id){
		$sql = mysqli_query($con, "DELETE FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($con));
	}
	if ($sql) {
		echo"<script>alert('".count($chk)." data berhasil di hapus');window.location='data.php';</script>";
	}else{
		echo"<script>alert('".$total." data gagal di hapus, coba lagi');window.location='data.php';</script>";
	}

}