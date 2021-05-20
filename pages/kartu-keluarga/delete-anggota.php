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
$id_keluarga = htmlspecialchars($_GET['id_keluarga']);

// delete database
$query = "DELETE FROM warga_has_kartu_keluarga WHERE id_pdd = $id_pdd AND id_keluarga = $id_keluarga";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";
} else {
  echo "<script>window.alert('Data anggota gagal dihapus!'); window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";
}
