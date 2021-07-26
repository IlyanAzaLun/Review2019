<?php
    require_once ".controller/config.php";
    if (isset($_SESSION['name'])) {
        echo "<script>window.location='".base_url('dashboard/index.php')."';</script>";
    }else{
    	echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    }
?>
