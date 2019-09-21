<?php
include_once("../_header.php");

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// // Generate a version 4 (random) UUID object
// $uuid4 = Uuid::uuid4();
// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
?>
<!--START TAMBAH DATA -->
    <div class="box">
        <h1>Rekam Medis
            <h4>
                <small>Tambah Data Rekam Medis</small>
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
                    <label for="pasien">Pasien</label>
                    <select name="pasien" id="pasien" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php 
                        $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien")or die(mysqli_error($con));
                        while($data_pasien = mysqli_fetch_array($sql_pasien)){
                            echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea type="text" name="keluhan" id="keluhan" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dokter">Dokter</label>
                    <select name="dokter" id="dokter" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php 
                        $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter")or die(mysqli_error($con));
                        while($data_dokter = mysqli_fetch_array($sql_dokter)){
                            echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <textarea type="text" name="diagnosa" id="diagnosa" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="poli">Poliklinik</label>
                    <select name="poli" id="poli" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php 
                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC")or die(mysqli_error($con));
                        while($data_poli = mysqli_fetch_array($sql_poli)){
                            echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="obat">Obat</label>
                    <select multiple name="obat[]" id="obat" class="form-control" size="10">
                        <?php 
                        $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat ASC")or die(mysqli_error($con));
                        while($data_obat = mysqli_fetch_array($sql_obat)){
                            echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Periksa</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" style="border: none;" value="<?=date('Y-m-d')?>" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" value="Simpan" name="add" class="btn btn-success" >
                    <input type="reset" value="Reset" name="reset" class="btn btn-default" >
                </div>
            </form>
        </div>
    </div>
<!--START TAMBAH DATA -->
<script>
    CKEDITOR.replace('keluhan',{
        uiColor: '#FF924E',
        removeButtons: 'Undo,Redo,Image, Table,Source,Format,Styles'
    });
    // CKEDITOR.replace('diagnosa');
</script>
<?php 
include_once("../_footer.php");
 ?>