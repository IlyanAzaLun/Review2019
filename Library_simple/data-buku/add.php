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
                <small>Tambah Data Buku</small>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-warning btn-sm">
                        <i class="fa fa-sm fa-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
        <div class="row">
            <div class="col col-lg-10">
                <form action="prosses.php" method="post">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="nama">Judul Buku</label>
                                <input type="hidden" name="id_buku" value="">
                                <input type="text" name="jdl_buku" id="jdl_buku" class="form-control" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="pns_buku">Penulis Buku</label><br>
                                <input type="text" name="pns_buku" id="pns_buku" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="pnb_buku">Penerbit Buku</label>
                                <input type="text" name="pnb_buku" id="pnb_buku" class="form-control" value="" required>
                            </div>    
                        </div>
                        <div class="col col-lg-6">
                        
                            <div class="form-group">
                                <label for="no_rk_buku">No Rak Buku</label>
                                <input type="text" name="no_rk_buku" id="no_rk_buku" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="thn_tb_buku">Tahun terbit Buku</label>
                                <input type="date" name="thn_tb_buku" id="thn_tb_buku" class="form-control" value="" required>
                            </div>    
                            <div class="form-group pull-right">
                                <input type="submit" value="Simpan" name="add" class="btn btn-success" >
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