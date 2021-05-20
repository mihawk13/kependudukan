<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_pdd = htmlspecialchars($_GET['id_pdd']);

// delete database
$query = "DELETE FROM warga WHERE id_pdd = $id_pdd";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../penduduk'</script>";
} else {
  echo "<script>window.alert('Data penduduk gagal dihapus!'); window.location.href='../penduduk'</script>";
}
