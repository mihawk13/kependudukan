<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_mutasi_masuk = htmlspecialchars($_GET['id_mutasi_masuk']);

$query = "SELECT * from mutasi_masuk where id_mutasi_masuk =$id_mutasi_masuk";
$hasil = mysqli_query($db, $query);

$dt = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $dt[] = $row;
}

// echo "<br>" . $dt[0]['id_pdd'] . "<br>";
// echo "<br>" . $dt[0]['id_kk'] . "<br>";
// echo "<br>" . $id_mutasi_masuk . "<br>";

$idpdd = $dt[0]['id_pdd'];
$idkk = $dt[0]['id_kk'];

// delete database
$query1 = "DELETE FROM kartu_keluarga WHERE id_keluarga = '$idkk'";
$query2 = "DELETE FROM penduduk WHERE id_pdd = '$idpdd'";
$query3 = "DELETE FROM mutasi_masuk WHERE id_mutasi_masuk = '$id_mutasi_masuk'";

$hasil1 = mysqli_query($db, $query1);
$hasil2 = mysqli_query($db, $query2);
$hasil3 = mysqli_query($db, $query3);

// cek keberhasilan pendambahan data
if ($hasil3 == true) {
  echo "<script>window.alert('Data mutasi berhasil dihapus!'); window.location.href='../mutasi-datang'</script>";
} else {
  echo "<script>window.alert('Data mutasi gagal dihapus!'); window.location.href='../mutasi-datang'</script>";
}
