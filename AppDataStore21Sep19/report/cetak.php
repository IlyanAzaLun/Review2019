<?php
ob_start();
require_once('../config/conn.php');
require_once('../models/database.php');
include('../models/m_barang.php');

$connection = new Database($host, $user, $pass, $dbnm);
$brg        = new Barang($connection);
$content = '
<style>
	.table{
		border-collapse:collapse;
		width: 100%;
		border:1px solid;
	}
	.table th{
		padding:8px 5px; background-color:#E28D2C; color:#FFFFFF;
	}
	.table td{
		margin: 8px;
		padding:8px;
	}
	img{
		width: 70px;
	}
</style>
';

$content .= '
<page>
	<div style="padding: 4mm; border:1px solid;" align="center">
	<span style="font-size:25px">Data Barang</span>
	</div>
	<div style="padding:20px 0 10px 0; font-size:15px;">
		Laporan Data Barang
	</div>
	<table class="table">
		<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
			<th>Stok Barang</th>
			<th>GambarBarang</th>
		</tr>';
		$no = 1;
		$tampil = $brg->tampil();
		while($data = $tampil->fetch_object()){
			$content .= '
			<tr>
				<td align="center">'.$no++.'</td>
				<td>'.$data->nama_brg.'</td>
				<td>'.number_format($data->harga_brg, 2,",",".").'</td>
				<td>'.$data->stok_brg.'</td>
				<td align="center" ><img src="../assets/img/barang/'.$data->gbr_brg.'"></td>
			</tr>
			';
		}
$content .='
	</table>
</page>

';
require '../assets/libs/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en');
$html2pdf->writeHTML($content);
$html2pdf->output('DataBarang.pdf');
?>