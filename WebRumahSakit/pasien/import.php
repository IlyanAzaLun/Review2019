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
                <small>Import Data Pasien</small>
                <div class="pull-right">
                    <a href="../_file/file.xls" class="btn btn-warning btn-xs">
                        <i class="glyphicon glyphicon-chevron-download-alt"></i>Download Format Excel
                    </a>
                    <a href="data.php" class="btn btn-warning btn-xs">
                        <i class="glyphicon glyphicon-chevron-left"></i>Kembali
                    </a>

                </div>
            </h4>
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="file">File Excel</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                
                <div class="form-group pull-right">
                    <input type="submit" value="Import" name="import" class="btn btn-success" >
                </div>
            </form>
        </div>
    </div>
<!--START TAMBAH DATA OBAT -->
<?php 
include_once("../_footer.php");
 ?>