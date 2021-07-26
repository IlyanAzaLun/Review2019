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
                        <th>Judul Buku</th>
                        <th>Penulis Buku</th>
                        <th>Penerbit Buku</th>
                        <th>Tahun Terbit</th>
                        <th>No Rak Buku</th>
                        <th><center><i class="fa fa-cog"></i></center></th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $sql = mysqli_query($con, "CALL `routine_buku`('select_1', @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td width="5%"><?=$no++?></td>
                        <td width="20%"><?=$data['jdl_buku']?></td>
                        <td width="20%"><?=$data['pns_buku']?></td>
                        <td width="15%"><?=$data['pnb_buku']?></td>
                        <td width="5%"><?=$data['thn_tb_buku']?></td>
                        <td width="10%"><?=$data['no_rk_buku']?></td>
                        <td width="10%">
                            <center>
                                <a href="edit.php?id_buku=<?=$data['id_buku']?>" class="btn btn-sm btn-warning"><i class="fa fa-sm fa-edit"></i></a>
                                <a onclick="if(confirm('Delete data.?')){return ture}else{return false}" href="prosses.php?id_buku=<?=$data['id_buku'] ?>" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-sm fa-trash"></i></a>
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