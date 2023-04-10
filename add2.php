<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $kode = $_POST['kode_supplier'];
  $nama = $_POST['nama_supplier'];
  $stok = $_POST['alamat'];
  $satuan = $_POST['nomor'];
  $harga = $_POST['email'];

	$query = "INSERT INTO supplier (KODE_SUPPLIER,NAMA_SUPPLIER,ALAMAT,NOMOR,EMAIL) VALUES ('".$kode."','".$nama."','".$stok."','".$satuan."','".$harga."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Stok Supplier berhasil ditambahkan'); 
	window.location.href='stoksupplier.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Stok Supplier ditambahkan');
	window.location.href='stoksupplier.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: stoksupplier.php'); 
}