<?php
require_once("../config/conn.php");
require_once("../models/database.php");
include("../models/m_barang.php");
$connection = new Database($host, $user, $pass, $dbnm);
$brg = new Barang($connection);

$fileName = "excel_barang-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename='$fileName'");
header("Content-Type: application/vnd.ms-excel")
?>
<table border="1">
	<tr>
		<th>No.</th>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Stok Barang</th>
	</tr>
	<?php
	$no = 1;
	$tampil = $brg->tampil();
	while ($data = $tampil->fetch_object()) {
		?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$data->nama_brg?></td>
			<td><?=$data->harga_brg?></td>
			<td><?=$data->stok_brg?></td>
		</tr>
		<?php
	}
	?>
</table>