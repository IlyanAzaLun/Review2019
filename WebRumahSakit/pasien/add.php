<?php
include_once("../_header.php");

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// // Generate a version 4 (random) UUID object
// $uuid4 = Uuid::uuid4();
// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
?>
<!--START TAMBAH DATA OBAT -->
    <div class="box">
        <h1>Pasien
            <h4>
                <small>Tambah Data Pasien</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs">
                        <i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                
                <div class="form-group">
                    <label for="identitas">Nomor Identitas</label>
                    <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" id="nama" class="form-control" required >
                </div> 
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <div>
                        <label for="jk" class="radio-inline"><input type="radio" name="jk" id="jk" value="L" required>Laki-Laki
                        </label>
                        <label for="jk" class="radio-inline"><input type="radio" name="jk" value="P">Peremuan
                        </label>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">No Telepon</label>
                    <input type="number" name="telp" id="telp" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" value="Simpan" name="add" class="btn btn-success" >
                </div>
            </form>
        </div>
    </div>
<!--START TAMBAH DATA OBAT -->
<?php 
include_once("../_footer.php");
 ?>