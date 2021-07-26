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
        <h1>Petugas
            <h4>
                <small>Edit Data Petugas</small>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-warning btn-sm">
                        <i class="fa fa-sm fa-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
        <div class="row">
            <div class="col col-lg-10">
                <?php
                $id = @$_GET['id_petugas'];
                $sql_dokter = mysqli_query($con, "SELECT * FROM tbl_petugas WHERE id_petugas = '$id'")or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql_dokter);
                ?>
                <form action="prosses.php" method="post">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama petugas</label>
                                <input type="hidden" name="id_petugas" value="<?=$data['id_petugas']?>">
                                <input type="text" name="nm_petugas" id="nm_petugas" class="form-control" value="<?=$data['nm_petugas']?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="jk_petugas">Jenis Kelamin</label><br>
                                <input type="radio" name="jk_petugas" value="1" id="L" <?=$data['jk_petugas']=='1'?'checked':''; ?>> <label for="L">Laki-Laki</label> &nbsp;
                                <input type="radio" name="jk_petugas" value="0" id="P" <?=$data['jk_petugas']=='0'?'checked':''; ?>> <label for="P">Perempuan</label>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?=$data['jabatan']?>" required>
                            </div>    
                            <div class="form-group">
                                <label for="tl_petugas">Nomor Telepon</label>
                                <input type="number" name="tl_petugas" id="tl_petugas" class="form-control" value="<?=$data['tl_petugas']?>" required>
                            </div>    
                        </div>
                        <div class="col col-lg-6">
                        
                        <div class="form-group">
                                <label for="shift">Waktu Shift</label><br>
                                <input type="radio" name="shift" value="1" id="M" <?=$data['shift']=='1'?'checked':''; ?>> <label for="M">Malam</label> &nbsp;
                                <input type="radio" name="shift" value="0" id="S" <?=$data['shift']=='0'?'checked':''; ?>> <label for="S">Siang</label>
                            </div>
                            <div class="form-group">
                                <label for="al_petugas">Alamat</label>
                                <textarea type="text" name="al_petugas" id="al_petugas" class="form-control" required><?=$data['al_petugas']?></textarea>
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