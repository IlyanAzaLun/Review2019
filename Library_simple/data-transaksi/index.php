<?php
include('../_header.php')
?>
<!-- START -->
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Peminjaman</h1>
        <div class="float-right">
            <a href="add.php" class="btn btn-sm btn-success"><i class="fa fa-sm fa-plus"></i> Add</a>
        </div>
        <form action="" method="post" name="proses">
            <table class="table table-striped table-bordered tabel-hover" id="petugas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Nama Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Harus Kembali</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                        <th><center><i class="fa fa-cog"></i></center></th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $sql = mysqli_query($con, "CALL `routine_transaksi`('select_1', @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);")or die(mysqli_error($con));
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td width="1%"><?=$no++?></td>
                        <td width="5%"><?=$data['nm_anggota']?></td>
                        <td width="5%"><?=$data['jdl_buku']?></td>
                        <td width="5%"><?=$data['nm_petugas']?></td>
                        <td width="5%"><?=$data['tanggal_peminjaman']?></td>
                        <td width="5%"><?=$data['tanggal_pemgembalian']?></td>
                        <td width="5%"><?=$data['tanggal_kembali']?></td>
                        <td width="5%">Rp.<?=$data['denda']?></td>
                        <td width="1%"> 
                            <center>
                                <a href="edit.php?kd_pinjam=<?=$data['id']?>" ><i class="fa fa-sm fa-edit"></i></a>
                                <a style="pointer-events: none;cursor: default;" onclick="if(confirm('Delete data.?')){return ture}else{return false}" href="prosses.php?kd_pinjam=<?=$data['id'] ?>" name="delete" ><i class="fa fa-sm fa-trash"></i></a>
                                <a name="info" id="info" data-toggle="modal" data-target="#myModal" data-id="<?=$data['id']?>" data-nm_anggota="<?=$data['nm_anggota']?>"  data-jdl_buku="<?=$data['jdl_buku']?>" data-nm_petugas="<?=$data['nm_petugas']?>" data-tanggal_peminjaman="<?=$data['tanggal_peminjaman']?>" data-tanggal_kembali="<?=$data['tanggal_kembali']?>" data-tanggal_kembali="<?=$data['tanggal_kembali']?>" data-denda="<?=$data['denda']?>" data-al_anggota="<?=$data['al_anggota']?>" data-tl_petugas="<?=$data['tl_petugas']?>" data-shift="<?=($data['shift'] == '1' ? 'Malam' :  'Siang')?>" data-no_rk_buku="<?=$data['no_rk_buku']?>" data-pnb_buku="<?=$data['pnb_buku']?>" data-pns_buku="<?=$data['pns_buku']?>" data-thn_tb_buku="<?=$data['thn_tb_buku']?>" data-tl_anggota="<?=$data['tl_anggota']?>" ><i class="fa fa-sm fa-info-circle" style="color:#4e73df"></i></a>
                                <a href="print.php?kd_pinjam=<?=$data['kd_pinjam']?>" ><i class="fa fa-sm fa-print" style="color:#4e73df"></i></a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                
                ?>
            </table>
        </form>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Data Transaksi Buku</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modal-body">
        <form action="" method="post">
        <div class="row">
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="nm_anggota">Nama Peminjam</label><br>
                    <p name="nm_anggota" id="nm_anggota" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label for="tl_anggota">Telepon Peminjam</label><br>
                    <p name="tl_anggota" id="tl_anggota" class="form-control" required></p>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="nm_petugas">Nama Petugas</label><br>
                    <p name="nm_petugas" id="nm_petugas" class="form-control" required></p>
                </div>
                
                <div class="form-group">
                    <label for="tl_petugas">Telepon Petugas</label><br>
                    <p name="tl_petugas" id="tl_petugas" class="form-control" required></p>
                </div>
            </div>
            <div class="col col-lg-12">
                <div class="form-group">
                    <label for="al_anggota">Alamat Peminjam</label><br>
                    <textarea name="al_anggota" id="al_anggota" class="form-control"></textarea>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="jdl_buku">Judul Buku</label><br>
                    <p name="jdl_buku" id="jdl_buku" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label for="no_rk_buku">No Rak Buku</label><br>
                    <p name="no_rk_buku" id="no_rk_buku" class="form-control" required></p>
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <label for="tanggal_peminjaman">Pinjam</label><br>
                            <p type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" required></p>
                        </div>
                    </div>
                    <div class="col col-lg-6"><div class="form-group">
                            <label for="tanggal_kembali">Tempo</label><br>
                            <p type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="pns_buku">Nama Penulis</label><br>
                    <p name="pns_buku" id="pns_buku" class="form-control" required></p>
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <label for="pnb_buku">Penerbit</label><br>
                            <p name="pnb_buku" id="pnb_buku" class="form-control" required></p>
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <label for="thn_tb_buku">Tahun</label><br>
                            <p name="thn_tb_buku" id="thn_tb_buku" class="form-control" required></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label><br>
                    <p type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required></p>
                </div>
            </div>
            
            <div class="col col-lg-12">
                <div class="form-group">
                    <label for="denda">Denda</label><br>
                    <p name="denda" id="denda" class="form-control" autofokus></p>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- .modal -->
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
        // MODAL
    
    $(document).on("click", "#info" ,function(){
        var kd_pinjam       = $(this).data('id');
        var nm_anggota      = $(this).data('nm_anggota');
        var al_anggota      = $(this).data('al_anggota');
        var jdl_buku        = $(this).data('jdl_buku');
        var no_rk_buku      = $(this).data('no_rk_buku');
        var nm_petugas      = $(this).data('nm_petugas');
        var shift           = $(this).data('shift');
        var tl_petugas      = $(this).data('tl_petugas');
        var tanggal_peminjaman      = $(this).data('tanggal_peminjaman');
        var tanggal_pengembalian = $(this).data('tanggal_pengembalian');
        var tanggal_kembali     = $(this).data('tanggal_kembali');
        var denda           = $(this).data('denda');
        var tl_anggota      = $(this).data('tl_anggota');
        var pnb_buku        = $(this).data('pnb_buku');
        var pns_buku        = $(this).data('pns_buku');
        var thn_tb_buku     = $(this).data('thn_tb_buku');
        
        $("#modal-body #kd_pinjam").html(kd_pinjam);
        $("#modal-body #nm_anggota").html(nm_anggota);
        $("#modal-body #al_anggota").html(al_anggota);
        $("#modal-body #jdl_buku").html(jdl_buku);
        $("#modal-body #no_rk_buku").html(no_rk_buku);
        $("#modal-body #nm_petugas").html(nm_petugas);
        $("#modal-body #shift").html(shift);
        $("#modal-body #tl_petugas").html(tl_petugas);
        $("#modal-body #tanggal_peminjaman").html(tanggal_peminjaman);
        $("#modal-body #tanggal_pengembalian").html(tanggal_pengembalian);
        $("#modal-body #tanggal_kembali").html(tanggal_kembali);
        $("#modal-body #denda").html(denda);
        $("#modal-body #tl_anggota").html(tl_anggota);
        $("#modal-body #pnb_buku").html(pnb_buku);
        $("#modal-body #pns_buku").html(pns_buku);
        $("#modal-body #thn_tb_buku").html(thn_tb_buku);

    });
</script>