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


// masukkan ke database

$query = "INSERT INTO user (nama, username, password, keterangan, status) VALUES ('$nama', '$username', '$password', '$keterangan', '$status');";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Tambah user berhasil'); window.location.href='../user'</script>";
} else {
  echo "<script>window.alert('Tambah user gagal!'); window.location.href='../user/create.php'</script>";
}
