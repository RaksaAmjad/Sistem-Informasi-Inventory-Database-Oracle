<?php
$username = "yoi_bangunan";
$password = "123";
$database = "Localhost/orcl";
$koneksi  = oci_connect ($username,$password,$database);
if(!$koneksi) {
$err=oci_error();
echo "Gagal tersambung ke ORACLE", $err['text'];
}
?>