<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'bengkel_motor');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Tidak bisa terkoneksi dengan MYSQL" . mysqli_connect_error());

session_start();

$base_url="http://{$_SERVER['SERVER_NAME']}".dirname($_SERVER["REQUEST_URI"].'?').'/';
// http://localhost/bengkel/connect.php
?>