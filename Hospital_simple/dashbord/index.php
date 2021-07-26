<?php
include_once("../_header.php");
 ?>
<!--START DASHBORD -->
	<div class="row">
        <div class="col-lg-12">
            <h1>Dashbord</h1>
            <p>Selamat datang <mark><?=$_SESSION['user'];?></mark> di website rumah sakit (rekam medis)</p>
            <!-- <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p> -->
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
<!-- DASHBORD END -->
<?php
include_once("../_footer.php");
 ?>