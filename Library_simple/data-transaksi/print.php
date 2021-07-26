<?php
require_once "../.controller/config.php";
// require_once "../.assets/";
$kd_pinjam = $_GET['kd_pinjam'];
$sql = mysqli_query($con, "CALL `routine_transaksi`('select_1', '$kd_pinjam', @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<h1 align="center">Data Transaksi</h1>
<link href="../.assets/css/sb-admin-2.min.css" rel="stylesheet">
<div class="row">
    <div class="col col-lg-6">
        <div class="form-group">
            <label for="nm_anggota">Nama Peminjam</label><br>
            <input name="nm_anggota" id="nm_anggota" class="form-control" value="<?=$data['nm_anggota']?>">
        </div>
        <div class="form-group">
            <label for="tl_anggota">Telepon Peminjam</label><br>
            <input name="tl_anggota" id="tl_anggota" class="form-control" value="<?=$data['tl_anggota']?>">
        </div>
    </div>
    <div class="col col-lg-6">
        <div class="form-group">
            <label for="nm_petugas">Nama Petugas</label><br>
            <input name="nm_petugas" id="nm_petugas" class="form-control" value="<?=$data['nm_petugas']?>">
        </div>
        
        <div class="form-group">
            <label for="tl_petugas">Telepon Petugas</label><br>
            <input name="tl_petugas" id="tl_petugas" class="form-control" value="<?=$data['tl_petugas']?>">
        </div>
    </div>
    <div class="col col-lg-12">
        <div class="form-group">
            <label for="al_anggota">Alamat Peminjam</label><br>
            <textarea name="al_anggota" id="al_anggota" class="form-control"><?=$data['al_anggota']?></textarea>
        </div>
    </div>
    <div class="col col-lg-6">
        <div class="form-group">
            <label for="jdl_buku">Judul Buku</label><br>
            <input name="jdl_buku" id="jdl_buku" class="form-control" value="<?=$data['jdl_buku']?>">
        </div>
        <div class="form-group">
            <label for="no_rk_buku">No Rak Buku</label><br>
            <input name="no_rk_buku" id="no_rk_buku" class="form-control" value="<?=$data['no_rk_buku']?>">
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="tgl_pinjam">Pinjam</label><br>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?=$data['tgl_pinjam']?>" required>
                </div>
            </div>
            <div class="col col-lg-6"><div class="form-group">
                    <label for="tgl_hrs_kembali">Tempo</label><br>
                    <input type="date" name="tgl_hrs_kembali" id="tgl_hrs_kembali" class="form-control" required value="<?=$data['tgl_hrs_kembali']?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col col-lg-6">
        <div class="form-group">
            <label for="pns_buku">Nama Penulis</label><br>
            <input name="pns_buku" id="pns_buku" class="form-control" required value="<?=$data['pns_buku']?>">
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="pnb_buku">Penerbit</label><br>
                    <input name="pnb_buku" id="pnb_buku" class="form-control" required value="<?=$data['pnb_buku']?>">
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="thn_tb_buku">Tahun</label><br>
                    <input name="thn_tb_buku" id="thn_tb_buku" class="form-control" required value="<?=$data['thn_tb_buku']?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tgl_kembali">Tanggal Kembali</label><br>
            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required value="<?=$data['tgl_kembali']?>">
        </div>
    </div>
    
    <div class="col col-lg-12">
        <div class="form-group">
            <label for="denda">Denda</label><br>
            <input name="denda" id="denda" class="form-control" autofokus>
        </div>
    </div>
</div>
<script>
    window.print();
</script>