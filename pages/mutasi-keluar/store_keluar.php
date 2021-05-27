<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
#$id_keluarga = htmlspecialchars($_POST['id_keluarga']);
$id_pdd = htmlspecialchars($_POST['id_pdd']);

$alamat_mutasi = htmlspecialchars($_POST['alamat_mutasi']);
$desa_kelurahan_mutasi = htmlspecialchars($_POST['desa_kelurahan_mutasi']);
$kecamatan_mutasi = htmlspecialchars($_POST['kecamatan_mutasi']);
$kabupaten_kota_mutasi = htmlspecialchars($_POST['kabupaten_kota_mutasi']);
$provinsi_mutasi = htmlspecialchars($_POST['provinsi_mutasi']);
$negara_mutasi = htmlspecialchars($_POST['negara_mutasi']);
$rt_mutasi = htmlspecialchars($_POST['rt_mutasi']);
$rw_mutasi = htmlspecialchars($_POST['rw_mutasi']);
$kode_pos_mutasi = htmlspecialchars($_POST['kode_pos_mutasi']);

$tanggal_pindah = htmlspecialchars($_POST['tanggal_pindah']);
$alasan_pindah = htmlspecialchars($_POST['alasan_pindah']);

// masukkan ke database

$query = "INSERT INTO mutasi_keluar (id_pdd, alamat_mutasi, desa_kelurahan_mutasi, kecamatan_mutasi, kabupaten_kota_mutasi, provinsi_mutasi, negara_mutasi, rt_mutasi, rw_mutasi, kode_pos_mutasi, tanggal_pindah, alasan_pindah) VALUES ('$id_pdd','$alamat_mutasi','$desa_kelurahan_mutasi', '$kecamatan_mutasi', '$kabupaten_kota_mutasi', '$provinsi_mutasi', '$negara_mutasi', '$rt_mutasi', '$rw_mutasi', '$kode_pos_mutasi','$tanggal_pindah','$alasan_pindah');";

mysqli_query($db, $query);

$query2 = "UPDATE penduduk SET status_kependudukan = 'Keluar' WHERE id_pdd = '$id_pdd'";
$hasil = mysqli_query($db, $query2);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  # echo "sukses";
  echo "<script>window.alert('Mutasi penduduk berhasil'); window.location.href='../mutasi-keluar/'</script>";
} else {
  echo "<script>window.alert('Mutasi penduduk gagal!'); window.location.href='../mutasi-keluar/pindah_keluar.php?id_pdd=" . $id_pdd . "'</script>";
  # echo "Gagal";
  echo mysqli_error($db);
}
