<?php
include_once("../_header.php");
 ?>
<!-- Multiple Seelect -->
    <div class="box">
        <h1>Poliklinik
            <h4>
                <small>Data Poliklinik</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-info btn-xs"></i>Data</a>
                    <a href="generate.php" class="btn btn-primary btn-xs"></i>Tambah Data Lagi</a>
                </div>
            </h4>
        </h1>
        <div class="row">
        	<div class="col-lg-8 col-lg-offset-2">
        		<form action="proses.php" method="post">
        			<input type="hidden" name="total" value="<?=$_POST['count_add']?>">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Gedung</th>
                        </tr>
                        <?php
                        for ($i=1; $i <= $_POST['count_add'] ; $i++) { ?>
                            <tr>
                                <td><?=$i ?></td>
                                <td>
                                    <input type="text" name="nama-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="gedung-<?=$i?>" class="form-control" required>
                                </td>
                            </tr>    
                        <?php
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" value="Simpan Semua" name="add" class="btn btn-success">
                    </div>
        		</form>
        	</div>
        </div>
    </div>
<!-- Multiple Seelect -->
 <?php
include_once("../_footer.php");
 ?>