<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['kd_buku'];
  $nama = $_POST['nm_buku'];
  $peng= $_POST['pengarang'];
  $terbit = $_POST['penerbit'];
  $tarif = $_POST['tarif'];
  $durasi = $_POST['durasi'];
	$query = "INSERT INTO buku_123 (KD_BUKU,NM_BUKU,PENGARANG,PENERBIT,TARIF,DURASI) VALUES ('".$id."','".$nama."','".$peng."','".$terbit."','".$tarif."','".$durasi."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Buku berhasil ditambahkan'); 
	window.location.href='buku.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Buku gagal ditambahkan');
	window.location.href='buku.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: buku.php'); 
}