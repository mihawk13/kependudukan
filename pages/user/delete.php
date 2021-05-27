<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id = htmlspecialchars($_GET['id']);

// cegah hapus data sendiri
if ($_SESSION['user']['id'] == $id) {
  echo "<script>window.alert('Tidak dapat menghapus data sendiri!'); window.location.href='../user'</script>";
  exit;
}

// delete database
$query = "DELETE FROM user WHERE id = $id";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../user'</script>";
} else {
  echo "<script>window.alert('Data user gagal dihapus!'); window.location.href='../user'</script>";
}
