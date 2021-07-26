<?php
    require_once "../.controller/config.php";

unset($_SESSION['name']);
echo "<script>window.location='".base_url('auth/login.php')."';</script>";
// Finally, destroy the session.
session_destroy();
?>
