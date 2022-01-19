<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['no_peminjam'];
  $petugas = $_POST['kd_petugas'];
  $nama= $_POST['nama_peminjam'];
  $alamat = $_POST['alamat_peminjam'];
  
	$query = "INSERT INTO peminjam (NO_PEMINJAM,KD_PETUGAS,NAMA_PEMINJAM,ALAMAT_PEMINJAM) VALUES ('".$id."','".$petugas."','".$nama."','".$alamat."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Peminjam berhasil ditambahkan'); 
	window.location.href='peminjam.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Buku gagal ditambahkan');
	window.location.href='peminjam.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: peminjam.php'); 
}