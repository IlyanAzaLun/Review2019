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
        <h1>Anggota
            <h4>
                <small>Tambah Data Anggota</small>
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
                                <label for="nama">Nama Anggota</label>
                                <input type="hidden" name="id_anggota" >
                                <input type="text" name="nm_anggota" id="nm_anggota" class="form-control"  required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="jk_anggota">Jenis Kelamin</label><br>
                                <input type="radio" name="jk_anggota" value="1" id="L" > <label for="L">Laki-Laki</label> &nbsp;
                                <input type="radio" name="jk_anggota" value="0" id="P" > <label for="P">Perempuan</label>
                            </div>
                            <div class="form-group">
                                <label for="tl_anggota">Nomor Telepon</label>
                                <input type="number" name="tl_anggota" id="tl_anggota" class="form-control" required>
                            </div>    
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="al_anggota">Alamat</label>
                                <textarea type="text" name="al_anggota" id="al_anggota" class="form-control" required></textarea>
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