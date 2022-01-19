<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['kd_petugas'];
  $nama = $_POST['nm_petugas'];
  $tlp= $_POST['nomor_tlpn'];
  
	$query = "INSERT INTO petugas (KD_PETUGAS,NM_PETUGAS,NOMOR_TLPN) VALUES ('".$id."','".$nama."','".$tlp."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Petugas berhasil ditambahkan'); 
	window.location.href='petugas.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Petugas gagal ditambahkan');
	window.location.href='petugas.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: petugas.php'); 
}