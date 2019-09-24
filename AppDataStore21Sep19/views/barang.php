<?php
include "./models/m_barang.php";
$brg = new Barang($connection);
if (@$_GET['act'] == '') {
?>
<div class="row">
  <div class="col-lg-12">
    <h1>Barang <small>Data barang</small></h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
      <li><a href="">Barang</a></li>
      <li class="active" >Data barang</li>
    </ol>
  </div>
</div><!-- /.row -->
<div class="row col-lg-12">
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped" id="dataBarang">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Stok Barang</th>
					<th>Gambar Barang</th>
					<th>Tanggal Publish</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<?
				$no = 1;
				$tampil = $brg->tampil();
				while($data = $tampil->fetch_object()){
					?>
			<tbody>
				<tr>
					<td align="center"><?=$no++;?>.</td>
					<td><?=$data->nama_brg;?></td>
					<td><?=number_format($data->harga_brg, 2,",",".")?></td>
					<td><?=$data->stok_brg;?></td>
					<td><?=date('d F Y', strtotime($data->tgl_publish));?></td>
					<td align="center">
						<a href="" data-toggle="modal" data-target="#viewGambar" data-nama="<?=$data->nama_brg?>" data-gambar="<?=$data->gbr_brg?>" id="picture">
							<img src="<?='assets/img/barang/'.$data->gbr_brg;?>" alt="" width="35px">
						</a>
					</td>
					<td align="center">
						<a href="" id="edit_brg" data-toggle="modal" data-target="#edit" data-id="<?=$data->id_brg?>" data-nama="<?=$data->nama_brg?>" data-harga="<?=$data->harga_brg?>" data-stok="<?=$data->stok_brg?>" data-gambar="<?=$data->gbr_brg?>">
						<button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
						<a href="?page=barang&act=del&id=<?=$data->id_brg;?>" onclick="return confirm('Yakin akan menghapus data ini.?')">
						<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button></a>
						<a href="./report/cetak.php?id=<?=$data->id_brg?>" target="_blank">
						<button class="btn btn-default btn-xs"><i class="fa fa-print"></i> Cetak</button></a>
					</td>
				</tr>
					<?
				}
			?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
	<a href="./report/report_exel_barang.php" target="_blank"><button class="btn btn-default btn-xs" ><i class="fa fa-print"></i> Export Excel</button></a>

	<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#cetakPdf"><i class="fa fa-file-text-o"></i> Cetak  Pdf</button>
	
	<div id="tambah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Barang</h4>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama_brg" class="control-label">Nama Barang</label>
							<input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
						</div>
						<div class="form-group">
							<label for="harga_brg" class="control-label">Harga Barang</label>
							<input type="number" class="form-control" id="harga_brg" name="harga_brg" required>
						</div>
						<div class="form-group">
							<label for="stok_brg" class="control-label">Stok Barang</label>
							<input type="number" class="form-control" id="stok_brg" name="stok_brg" required>
						</div>
						<div class="form-group">
							<label for="gbr_brg" class="control-label">Gambar Barang</label>
							<input type="file" class="form-control" id="gbr_brg" name="gbr_brg">
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger">Reset</button>
						<input type="submit" value="Simpan" name="tambah" class="btn btn-success">
					</div>
				</form>
				<?
					if (@$_POST['tambah']) {
						$nama_brg  = $connection->conn->real_escape_string($_POST['nama_brg']);
						$harga_brg = $connection->conn->real_escape_string($_POST['harga_brg']);
						$stok_brg  = $connection->conn->real_escape_string($_POST['stok_brg']);
						
						$extensi   = explode(".", $_FILES['gbr_brg']['name']);
						$gbr_brg   = 'brg-'.round(microtime(true)).'.'.end($extensi);
						$sumber    = $_FILES['gbr_brg']['tmp_name'];
						$upload    = move_uploaded_file($sumber, "assets/img/barang/".$gbr_brg);

						if ($upload) {
							$brg->tambah($nama_brg, $harga_brg, $stok_brg, $gbr_brg);
							header("Location: ?page=barang");
						}else{
							echo "<script>alert('Upload Gagal!');</script>";
						}
					}
				?>
			</div>
		</div>
	</div><!-- Tambah data -->
	<!--  -->
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Data Barang</h4>
				</div>
				<form id="form" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label for="nama_brg" class="control-label">Nama Barang</label>
							<input type="hidden" id="id_brg" name="id_brg">
							<input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
						</div>
						<div class="form-group">
							<label for="harga_brg" class="control-label">Harga Barang</label>
							<input type="number" class="form-control" id="harga_brg" name="harga_brg" required>
						</div>
						<div class="form-group">
							<label for="stok_brg" class="control-label">Stok Barang</label>
							<input type="number" class="form-control" id="stok_brg" name="stok_brg" required>
						</div>
						<div class="form-group">
							<label for="gbr_brg" class="control-label">Gambar Barang</label>
							<div style="padding-bottom: 20px;">
								<img src="" width="100px" id="pict">
							</div>
							<input type="file" class="form-control" id="gbr_brg" name="gbr_brg">
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" value="Simpan" name="edit" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div><!-- Edit -->
	
	<div id="cetakPdf" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cetak Per Periode</h4>
				</div>
				<div class="modal-body">
					<form action="./report/cetak.php" method="post" target="_blank">
						<table>
							<tr>
								<td>
									<div class="form-group">Dari tanggal</div>
								</td>
								<td align="center" width="5%">
									<div class="form-group">:</div>
								</td>
								<td>
									<div class="form-group"><input type="date" class="form-control" name="tgl_a" required></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">Sampai tanggal</div>
								</td>
								<td align="center" width="5%">
									<div class="form-group">:</div>
								</td>
								<td>
									<div class="form-group"><input type="date" class="form-control" name="tgl_b" required></div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name="cetak_barang" class="btn btn-primary btn-xs" value="Cetak"></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<a href="./report/cetak.php" target="_blank">
						<button class="btn btn-default btn-xs"><i class="fa fa-file-text-o"></i> Cetak PDF</button>
					</a>
				</div>
				
			</div>
		</div>
	</div> <!-- Cetak per periode -->

	<div id="viewGambar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title name_picture"></h4>
				</div>
				<div id="modal-picture">
					<div class="form-group" align="center">
						<img src="" alt="" class="picture" width="500px">
					</div>
				</div>
				<div class="modal-footer">
				</div>
				
			</div>
		</div>
	</div>
	<!-- ViewGambar-->
	
	<script>
		$(document).on("click", "#edit_brg" ,function(){
			var id_brg    = $(this).data('id');
			var nama_brg  = $(this).data('nama');
			var harga_brg = $(this).data('harga');
			var stok_brg  = $(this).data('stok');
			var gbr_brg   = $(this).data('gambar');

			$("#modal-edit #id_brg").val(id_brg);
			$("#modal-edit #nama_brg").val(nama_brg);
			$("#modal-edit #harga_brg").val(harga_brg);
			$("#modal-edit #stok_brg").val(stok_brg);
			$("#modal-edit #pict").attr("src", "assets/img/barang/"+gbr_brg);
		});
		$(document).on("click", "#picture", function(){
			var nama_brg  = $(this).data('nama');
			var gbr_brg = $(this).data('gambar');

			$(".name_picture").html(nama_brg);
			$("#modal-picture .picture").attr("src", "assets/img/barang/"+gbr_brg);
		})
		
		$(document).ready(function(e){
			$("#form").on("submit", (function(e){
				e.preventDefault();
				$.ajax({
					url : 'models/proses-edit-barang.php',
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					processData : false,
					success:function(msg){
						$(".table").html(msg);
					}
				});
			}));
		})
	</script>
</div>

<?php
}else if(@$_GET['act'] == 'del'){
	$gbr_awal = $brg->tampil($_GET['id'])->fetch_object()->gbr_brg;
	unlink("assets/img/barang/".$gbr_awal);

	$brg->hapus($_GET['id']);
	header("Location: ?page=barang");
}
?>