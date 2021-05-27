<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));
$keterangan = htmlspecialchars($_POST['keterangan']);
$status = htmlspecialchars($_POST['status']);

$id = htmlspecialchars($_POST['id']);

if ($_POST['password'] == '') {
  // jika tidak ubah password

  $query = "UPDATE user SET nama = '$nama', username = '$username', keterangan = '$keterangan', status = '$status' WHERE id = $id;";
} else {
  // jika ubah password

  $query = "UPDATE user SET nama = '$nama', username = '$username', password = '$password', keterangan = '$keterangan', status = '$status' WHERE id = $id;";
}

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah data user berhasil'); window.location.href='../user'</script>";
} else {
  echo "<script>window.alert('Ubah data user gagal!'); window.location.href='../user'</script>";
}
