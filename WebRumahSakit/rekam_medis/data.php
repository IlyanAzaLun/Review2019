<?php
include_once("../_header.php");
 ?>
<!--START DATA POLIKLINIK -->
    <div class="box">
        <h1>Rekam Medis
            <h4>
                <small>Data Rekam Medis</small>
                <div class="pull-right"><a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah data</a></div>
                <div class="pull-right"><a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a></div>
            </h4>
        </h1>
        <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Nama Dokter</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
<!-- DATA POLIKLINIK END -->

<?php
include_once("../_footer.php");
 ?>