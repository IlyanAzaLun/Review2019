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
                $id = @$_GET['kd_pinjam'];
                $sql = mysqli_query($con, "CALL `routine_transaksi`('select_1', '$id', @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql);
                ?>
<h1>Data Transaksi</h1>                <form action="prosses.php" method="post">
                    <div class="row">
                        <div class="col col-lg-6">
                        <div class="form-group">
                                <label for="nama">Nama Peminjam</label>
                                <input type="text" name="nm_anggota" id="nm_anggota" class="form-control" value="<?=$data['nm_anggota']?>" disabled autofocus>
                                <input type="hidden" name="kd_pinjam" id="kd_pinjam" class="form-control" value="<?=$data['kd_pinjam']?>">

                            </div>
                            <div class="form-group">
                                <label for="al_anggota">Alamat Peminjam</label>
                                <textarea type="text" name="al_anggota" id="al_anggota" class="form-control" disabled><?=$data['al_anggota']?></textarea>
                            </div>
                            <div class="row">
                                <div class="col col-lg-6">
                                    <div class="form-group">
                                        <label for="jdl_buku">Judul Buku</label>
                                        <input type="text" name="jdl_buku" id="jdl_buku" class="form-control" value="<?=$data['jdl_buku']?>" disabled autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="pnb_buku">Penerbit Buku</label>
                                        <input type="text" name="pnb_buku" id="pnb_buku" class="form-control" value="<?=$data['pnb_buku']?>" disabled autofocus>
                                    </div>
                                </div>
                                <div class="col col-lg-6">
                                    <div class="form-group">
                                        <label for="pns_buku">Penulis Buku</label>
                                        <input type="text" name="pns_buku" id="pns_buku" class="form-control" value="<?=$data['pns_buku']?>" disabled autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="thn_tb_buku">Tahun Terbit Buku</label>
                                        <input type="text" name="thn_tb_buku" id="thn_tb_buku" class="form-control" value="<?=$data['thn_tb_buku']?>" disabled autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_rk_buku">No Rak Buku</label>
                                <input type="text" name="no_rk_buku" id="no_rk_buku" class="form-control" value="<?=$data['no_rk_buku']?>" disabled autofocus>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama petugas</label>
                                <input type="text" name="nm_petugas" id="nm_petugas" class="form-control" value="<?=$data['nm_petugas']?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="tl_petugas">Nomor Telepon</label>
                                <input type="number" name="tl_petugas" id="tl_petugas" class="form-control" value="<?=$data['tl_petugas']?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="shift">Waktu Shift</label><br>
                                <input type="radio" name="shift" value="1" id="M" <?=$data['shift']=='1'?'checked':''; ?> disabled> <label for="M">Malam</label> &nbsp;
                                <input type="radio" name="shift" value="0" id="S" <?=$data['shift']=='0'?'checked':''; ?> disabled> <label for="S">Siang</label>
                            </div>    
                            <div class="row">
                                <div class="col col-lg-6">
                                    <div class="form-group">
                                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                                        <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?=$data['tgl_pinjam']?>" required disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tgl_kembali">Tanggal Kembali</label>
                                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value="<?=$data['tgl_kembali']?>" required>
                                    </div>
                                    
                                </div>
                                <div class="col col-lg-6">
                                    <div class="form-group">
                                        <label for="tgl_hrs_kembali">Tanggal Harus Kemabali</label>
                                        <input type="date" name="tgl_hrs_kembali" id="tgl_hrs_kembali" class="form-control" value="<?=$data['tgl_hrs_kembali']?>" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Denda</label>
                                        <input type="text" name="denda" id="denda" class="form-control" value="<?=$data['denda']?>" required>
                                    </div>
                                </div>
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