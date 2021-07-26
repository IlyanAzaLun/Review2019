<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
include_once('con.php');
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
	echo(mysqli_connect_errno());
}
function base_url($url = null){
	$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".'';
	if ($url != null) {
		return $base_url."/".$url;
	}
	else{
		return $base_url;
	}
}

function tgl_indo($tgl){
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);
	return $tanggal."/".$bulan."/".$tahun;
}
  ?>
