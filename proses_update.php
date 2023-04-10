<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $kode = $_POST['kode_barang'];
  $nama = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $satuan = $_POST['kode_supplier'];
  $harga = $_POST['harga'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  BARANG  SET NAMA_BARANG ='".$nama."', STOK ='".$stok."', KODE_SUPPLIER ='".$satuan."', HARGA ='".$harga."' WHERE KODE_BARANG = '".$kode."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Stok Barang berhasil diubah'); window.location.href='stokbarang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Stok Barang gagal diubah'); window.location.href='stokbarang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: stokbarang.php'); 
}