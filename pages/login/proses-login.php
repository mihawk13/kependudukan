<?php
session_start();
include('../../config/koneksi.php');

// ambil data
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));

// periksa username dan password
$query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
$hasil = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($hasil);

// cek
if ($data != null) {
  // jika user dan password cocok
  $_SESSION['user'] = $data;
  header('Location: ../dasbor');
} else {
  // jika user dan password tidak cocok
  echo "<script>window.alert('Username atau password salah'); window.location.href='../login'</script>";
}
