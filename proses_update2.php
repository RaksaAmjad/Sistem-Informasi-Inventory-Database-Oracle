<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $kode = $_POST['kode_supplier'];
  $nama = $_POST['nama_supplier'];
  $stok = $_POST['alamat'];
  $satuan = $_POST['nomor'];
  $harga = $_POST['email'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  SUPPLIER  SET NAMA_SUPPLIER ='".$nama."', ALAMAT ='".$stok."', NOMOR ='".$satuan."', EMAIL ='".$harga."' WHERE KODE_SUPPLIER = '".$kode."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Stok Supplier berhasil diubah'); window.location.href='stoksupplier.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Stok Supplier gagal diubah'); window.location.href='stoksupplier.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: stoksupplier.php'); 
}