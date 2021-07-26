<?php
include_once("../_header.php");

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// // Generate a version 4 (random) UUID object
// $uuid4 = Uuid::uuid4();
// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
?>
<!--START TAMBAH DATA OBAT -->
    <div class="container">
        <h1>Buku
            <h4>
                <small>Edit Data Buku</small>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-warning btn-sm">
                        <i class="fa fa-sm fa-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
        <div class="row">
            <div class="col col-lg-10">
                <?php
                $id = @$_GET['id_buku'];
                $sql_dokter = mysqli_query($con, "SELECT * FROM tbl_buku WHERE id_buku = '$id'")or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_dokter);
                ?>
                <form action="prosses.php" method="post">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="nama">Judul Buku</label>
                                <input type="hidden" name="id_buku" value="<?=$data['id_buku']?>">
                                <input type="text" name="jdl_buku" id="jdl_buku" class="form-control" value="<?=$data['jdl_buku']?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="pns_buku">Penulis Buku</label><br>
                                <input type="text" name="pns_buku" id="pns_buku" class="form-control" value="<?=$data['pns_buku']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="pnb_buku">Penerbit Buku</label>
                                <input type="text" name="pnb_buku" id="pnb_buku" class="form-control" value="<?=$data['pnb_buku']?>" required>
                            </div>    
                        </div>
                        <div class="col col-lg-6">
                            
                            <div class="form-group">
                                <label for="thn_tb_buku">Tahun terbit Buku</label>
                                <input type="number" name="thn_tb_buku" id="thn_tb_buku" class="form-control" value="<?=$data['thn_tb_buku']?>" required>
                            </div>    
                            <div class="form-group">
                                <label for="no_rk_buku">No Rak Buku</label>
                                <input type="text" name="no_rk_buku" id="no_rk_buku" class="form-control" value="<?=$data['no_rk_buku']?>" required>
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="Simpan" name="edit" class="btn btn-success" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col col-lg-2"></div>
        </div>
        
    </div>
<!--START TAMBAH DATA OBAT -->
<?php 
include_once("../_footer.php");
 ?>
