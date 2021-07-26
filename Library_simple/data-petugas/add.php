<?php
include_once("../_header.php");

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// // Generate a version 4 (random) UUID object
// $uuid4 = Uuid::uuid4();
// echo $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
?>
<script>
function validateForm() {
        var mypass = document.forms["myForm"]["re_pw_petugas"].value;
        var myrepass = document.forms["myForm"]["pw_petugas"].value;
        if (myrepass != mypass) {
            // alert(mypass);
            // alert(myrepass);
            var html = '<div class="form-group">';
                html +='<div class="alert alert-danger alert-dismissable" role="alert">';
                html +='<a href="" class="close" data-dismiss="alert" arial-label="close">&times;</a>';
                html +='<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                html +='<strong>Tambah Data gagal </strong> Password harus sama.!';
                html +='</div>';
                html +='</div>';
            $('h4').append(html);
            return false;
        }else{
            return true;
        }
    }
</script>
<!--START TAMBAH DATA OBAT -->
    <div class="container">
        <h1>Petugas
            <h4>
                <small>Tambah Data Petugas</small>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-warning btn-sm">
                        <i class="fa fa-sm fa-chevron-left"></i>Kembali</a>
                </div>
            </h4>
        </h1>
        <div class="row">
            <div class="col col-lg-10">
                <form action="prosses.php" method="post" onsubmit="return validateForm()" name="myForm">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama petugas</label>
                                <input type="hidden" name="id_petugas" value="">
                                <input type="text" name="nm_petugas" id="nm_petugas" class="form-control" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pw_petugas" id="pw_petugas" class="form-control" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Retype Password</label>
                                <input type="password" name="re_pw_petugas" id="re_pw_petugas" class="form-control" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="jk_petugas">Jenis Kelamin</label><br>
                                <input type="radio" name="jk_petugas" value="1" id="L" > <label for="L">Laki-Laki</label> &nbsp;
                                <input type="radio" name="jk_petugas" value="0" id="P" > <label for="P">Perempuan</label>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="" required>
                            </div>    
                            <div class="form-group">
                                <label for="tl_petugas">Nomor Telepon</label>
                                <input type="number" name="tl_petugas" id="tl_petugas" class="form-control" value="" required>
                            </div>                            
                            <div class="form-group">
                                <label for="shift">Waktu Shift</label><br>
                                <input type="radio" name="shift" value="1" id="M" > <label for="M">Malam</label> &nbsp;
                                <input type="radio" name="shift" value="0" id="S" > <label for="S">Siang</label>
                            </div>
                            <div class="form-group">
                                <label for="al_petugas">Alamat</label>
                                <textarea type="text" name="al_petugas" id="al_petugas" class="form-control" required></textarea>
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="Simpan" name="add" class="btn btn-success">
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

 <script>
 $(document).ready(function(){
    
 });
 </script>