<?php
include_once("../_header.php");
 ?>
<!--START DATA POLIKLINIK -->
	<div class="box">
		<h1>Dokter
			<h4>
				<small>Data Dokter</small>
				<div class="pull-right"><a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah data</a></div>
				<div class="pull-right"><a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a></div>
			</h4>
		</h1>
		<form action="" method="post" name="proses">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dokter">
				<thead>
					<tr>
						<th>
							<center>
								<input type="checkbox" id="select_all" value="">
							</center>
						</th>
						<th>No.</th>
						<th>Nama Dokter</th>
						<th>Gedung</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
						<th><i class="glyphicon glyphicon-cog"></i></th>
					</tr>
				</thead>
				<?php 
				$no = 1;
				$sql_poli = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
					while ($data = mysqli_fetch_array($sql_poli)) {
					?>
						<tr>							
							<td align="center"><input type="checkbox" name="checked[]" class="checked" value="<?=$data['id_dokter']?>"></td>
							<td><?=$no++?></td>
							<td><?=$data['nama_dokter']?></td>
							<td><?=$data['spesialis']?></td>
							<td><?=$data['alamat']?></td>
							<td><?=$data['no_telp']?></td>
							<td>
								<a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-cog"></i></a>
							</td>
						</tr>
					<?php
					}
				?>
				<tbody>
				</tbody>
			</table>
		</div>
		</form>
		<div class="box pull-right">
			<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
		</div>
	</div>
<!-- DATA POLIKLINIK END -->
<script>
	$(document).ready(function(){
		// CUSTOM DATA TABLES================
		$('#dokter').DataTable({
			"columnDefs": [
				{
					"searchable": false,
					"orderable": false,
					"targets": [0, 6]
				}
			],
			"order": [1, "asc"]
		});
		// CUSTOM DATA TABLES===============

		$("#select_all").on("click", function(){
			if(this.checked){
				$('.checked').each(function(){
					this.checked = true;
				});
			}else{
				$('.checked').each(function(){
					this.checked = false;
				});
			}
		});

		$(".checked").on("click", function(){
			if ($(".checked:checked").length == $(".checked").length){
				$("#select_all").prop('checked', true)
			}else{
				$("#select_all").prop('checked', false)
			}
		});
	});
	function hapus(){
		var conf = confirm("Yakin akan menghapus data?");
		if (conf) {
			document.proses.action = "del.php";	
			document.proses.submit();
		}		
	}
</script>
<?php
include_once("../_footer.php");
 ?>