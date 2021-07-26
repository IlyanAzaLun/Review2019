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
        <h1>Transaksi
            <h4>
                <small>Tambah Data Transaksi</small>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-warning btn-sm">
                        <i class="fa fa-sm fa-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
        <div class="row">
            <div class="col col-lg-12">
                <form action="prosses.php" method="post">
                    <div class="row">
                        <div class="col col-lg-4">
                            <div class="form-group">
                                <label for="nm_anggota">Nama Anggota</label>
                                <select name="id_anggota" id="nm_anggota" class="form-control">
                                    <option value="">- Pilih -</option>
                                        <?php 
                                            $sql_anggota = mysqli_query($con, "SELECT * FROM tbl_anggota")or die(mysqli_error($con));
                                            while($data_anggota = mysqli_fetch_array($sql_anggota)){
                                                echo '<option value="'.$data_anggota['id_anggota'].'">'.$data_anggota['nm_anggota'].'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="form-group">
                                <label for="nm_petugas">Nama petugas</label>
                                <select name="id_petugas" id="nm_petugas" class="form-control">
                                    <option value="">- Pilih -</option>
                                        <?php 
                                            $sql_petugas = mysqli_query($con, "SELECT * FROM tbl_petugas")or die(mysqli_error($con));
                                            while($data_petugas = mysqli_fetch_array($sql_petugas)){
                                                echo '<option value="'.$data_petugas['id_petugas'].'">'.$data_petugas['nm_petugas'].'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="form-group">
                                <label for="jdl_buku">Judul Buku</label>
                                <select name="id_buku" id="jdl_buku" class="form-control">
                                    <option value="">- Pilih -</option>
                                        <?php 
                                            $sql_buku = mysqli_query($con, "SELECT * FROM tbl_buku")or die(mysqli_error($con));
                                            while($data_buku = mysqli_fetch_array($sql_buku)){
                                                echo '<option value="'.$data_buku['id_buku'].'">'.$data_buku['jdl_buku'].'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="tgl_pinjam">Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?=$data['tgl_pinjam']?>" required >
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="tgl_hrs_kembali">Tanggal Harus Kemabali</label>
                                <input type="date" name="tgl_hrs_kembali" id="tgl_hrs_kembali" class="form-control" value="<?=$data['tgl_hrs_kembali']?>" required >
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="Simpan" name="add" class="btn btn-success" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
<!--START TAMBAH DATA OBAT -->
<?php 
include_once("../_footer.php");
 ?>