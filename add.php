<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $kode = $_POST['kode_barang'];
  $nama = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $satuan = $_POST['kode_supplier'];
  $harga = $_POST['harga'];

	$query = "INSERT INTO barang (KODE_BARANG,NAMA_BARANG,STOK,KODE_SUPPLIER,HARGA) VALUES ('".$kode."','".$nama."','".$stok."','".$satuan."','".$harga."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Stok Barang berhasil ditambahkan'); 
	window.location.href='stokbarang.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Stok Barang gagal ditambahkan');
	window.location.href='stokbarang.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: stokbarang.php'); 
}