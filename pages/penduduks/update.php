<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$nik = htmlspecialchars($_POST['nik']);
$nama = htmlspecialchars($_POST['nama']);
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
$tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
$alamat_ktp = htmlspecialchars($_POST['alamat_ktp']);
$alamat = htmlspecialchars($_POST['alamat']);
$desa_kelurahan = htmlspecialchars($_POST['desa_kelurahan']);
$kecamatan = htmlspecialchars($_POST['kecamatan']);
$kabupaten_kota = htmlspecialchars($_POST['kabupaten_kota']);
$provinsi = htmlspecialchars($_POST['provinsi']);
$negara = htmlspecialchars($_POST['negara']);
$rt = htmlspecialchars($_POST['rt']);
$rw = htmlspecialchars($_POST['rw']);
$agama = htmlspecialchars($_POST['agama']);
$pendidikan_terakhir = htmlspecialchars($_POST['pendidikan_terakhir']);
$pekerjaan = htmlspecialchars($_POST['pekerjaan']);
$status = htmlspecialchars($_POST['status']);
$id_pdd = htmlspecialchars($_POST['id_pdd']);


// update database

$query = "UPDATE penduduk SET nik = '$nik', nama = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', alamat_ktp = '$alamat_ktp', alamat = '$alamat', desa_kelurahan = '$desa_kelurahan', kecamatan = '$kecamatan', kabupaten_kota = '$kabupaten_kota', provinsi = '$provinsi', negara = '$negara',rt = '$rt', rw = '$rw', agama = '$agama', pendidikan_terakhir = '$pendidikan_terakhir', pekerjaan = '$pekerjaan', status_perkawinan = '$status' WHERE penduduk.id_pdd = $id_pdd;";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah data penduduk berhasil'); window.location.href='../penduduks'</script>";
} else {
  echo "<script>window.alert('Ubah data penduduk gagal!'); window.location.href='../penduduks'</script>";
}
