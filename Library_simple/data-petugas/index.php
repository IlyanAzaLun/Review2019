<?php
include('../_header.php')
?>
<!-- START -->
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Petugas Perpustakaan</h1>
        <div class="float-right">
            <a href="add.php" class="btn btn-sm btn-success"><i class="fa fa-sm fa-plus"></i> Add</a>
        </div>
        <form action="" method="post" name="proses">
            <table class="table table-striped table-bordered tabel-hover" id="petugas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Waktu shift</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th><center><i class="fa fa-cog"></i></center></th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $sql = mysqli_query($con, "CALL `routine_petugas`('select_1', @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td width="1%"><?=$no++?></td>
                        <td width="15%"><?=$data['nm_petugas']?></td>
                        <td width="10%"><?=($data['jk_petugas'] == "1" ? "Laki Laki" : "Perempuan")?></td>
                        <td width="10%"><?=$data['jabatan']?></td>
                        <td width="10%"><?=($data['shift'] == "1" ? "Malam" :  "Siang")?></td>
                        <td width="10%"><?=$data['tl_petugas']?></td>
                        <td width="20%"><?=$data['al_petugas']?></td>
                        <td width="10%"> 
                            <center>
                                <a href="edit.php?id_petugas=<?=$data['id_petugas']?>" class="btn btn-sm btn-warning"><i class="fa fa-sm fa-edit"></i></a>
                                <a onclick="if(confirm('Delete data.?')){return ture}else{return false}" href="prosses.php?id_petugas=<?=$data['id_petugas'] ?>" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-sm fa-trash"></i></a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                
                ?>
            </table>
        </form>
    </div>
    <!-- /.container -->
<!-- END -->
<?php
include('../_footer.php')
?>
<script>
$(document).ready(function(){
    $('#petugas').DataTable({
        "colomnDefs":[
            {
                "searchable":false,
                "orderable":false,
                "targets":[0,6],
            }
        ],
        "order":[0,"asc"],
        "aLengthMenu": [[5, 50, 75, -1], [5, 50, 75, "All"]],
        "iDisplayLength": 5
            
    });
});
    // CUSTOM DATA TABLES===============
</script>