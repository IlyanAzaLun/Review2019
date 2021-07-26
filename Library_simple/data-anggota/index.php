<?php
include('../_header.php')
?>
<!-- START -->
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Anggota Perpustakaan</h1>
        <div class="float-right">
            <a href="add.php" class="btn btn-sm btn-success"><i class="fa fa-sm fa-plus"></i> Add</a>
        </div>
        <form action="" method="post" name="proses">
            <table class="table table-striped table-bordered tabel-hover" id="anggota">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th><center><i class="fa fa-cog"></i></center></th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $sql = mysqli_query($con, "CALL `routine_anggota`('select_1', @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nm_anggota']?></td>
                        <td><?=($data['jk_anggota'] == "1" ? "Laki Laki" : "Perempuan")?></td>
                        <td><?=$data['tl_anggota']?></td>
                        <td><?=$data['al_anggota']?></td>
                        <td>
                            <center>
                                <a href="edit.php?id_anggota=<?=$data['id_anggota']?>" class="btn btn-sm btn-warning"><i class="fa fa-sm fa-edit"></i></a>
                                <a onclick="if(confirm('Delete data.?')){return ture}else{return false}" href="prosses.php?id_anggota=<?=$data['id_anggota'] ?>" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-sm fa-trash"></i></a>
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
    $('#anggota').DataTable({
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