<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['kd_jurusan'];
  $peminjam = $_POST['no_peminjam'];
  $jurusan= $_POST['jurusan'];
  
	$query = "INSERT INTO jurusan (KD_JURUSAN,NO_PEMINJAM,JURUSAN) VALUES ('".$id."','".$peminjam."','".$jurusan."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Jurusan berhasil ditambahkan'); 
	window.location.href='jurusan.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Jurusan gagal ditambahkan');
	window.location.href='jurusan.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: jurusan.php'); 
}