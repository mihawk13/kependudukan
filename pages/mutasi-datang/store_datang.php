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
$nomor_kk = htmlspecialchars($_POST['nomor_kk']);
$nama_kepala_keluarga = htmlspecialchars($_POST['nama_kepala_keluarga']);
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
$tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
$jenis_kelamin = htmlspecialchars($_POST['jk']);
$agama = htmlspecialchars($_POST['agama']);
$pendidikan_terakhir = htmlspecialchars($_POST['pendidikan_terakhir']);
$status_perkawinan = htmlspecialchars($_POST['status_perkawinan']);
$pekerjaan = htmlspecialchars($_POST['pekerjaan']);
$rt = htmlspecialchars($_POST['rt']);
$rw = htmlspecialchars($_POST['rw']);
$alamat_asal = htmlspecialchars($_POST['alamat_asal']);
$tanggal_pindah = htmlspecialchars($_POST['tanggal_pindah']);
$alasan_pindah = htmlspecialchars($_POST['alasan_pindah']);

$query_cek = "SELECT nomor_kk from kartu_keluarga where nomor_kk=$nomor_kk";
$cek_nik = mysqli_num_rows(mysqli_query($db, $query_cek));
if ($cek_nik > 0) {
  echo "<script>window.alert('Tambah penduduk gagal!, No. KK $nomor_kk sudah digunakan !'); history.back()</script>";
} else {

  //echo $query_cek;
  // masukkan ke database

  $query = "INSERT INTO penduduk (nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_ktp, alamat, desa_kelurahan, kecamatan, kabupaten_kota, provinsi, negara, rt, rw, agama, pendidikan_terakhir, pekerjaan, status_perkawinan, status_kependudukan) VALUES ('$nik', '$nama_kepala_keluarga', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat_asal', '$alamat_asal', 'Wae Belang', 'Ruteng', 'Manggarai', 'Nusa Tenggara Timur', 'Indonesia', '$rt', '$rw', '$agama', '$pendidikan_terakhir', '$pekerjaan', '$status_perkawinan', 'Pindahan');";
  $hasil = mysqli_query($db, $query);
  //echo $query;

  $query3 = "SELECT * FROM penduduk order by id_pdd DESC";
  $hasil3 = mysqli_query($db, $query3);
  $jum = mysqli_num_rows($hasil3);
  $hasil4 = mysqli_fetch_array($hasil3);
  $id_pdd = $hasil4['id_pdd'];

  $query_kk = "INSERT INTO kartu_keluarga (nomor_kk, id_kepala_keluarga) VALUES ('$nomor_kk', '$id_pdd');";
  $hasil_kk = mysqli_query($db, $query_kk);

  $query3 = "SELECT * FROM kartu_keluarga order by id_keluarga DESC";
  $hasil3 = mysqli_query($db, $query3);
  $jum = mysqli_num_rows($hasil3);
  $hasil4 = mysqli_fetch_array($hasil3);
  $id_keluarga = $hasil4['id_keluarga'];


  // echo "<br>" . $id_pdd . "<br>";
  // echo "<br>" . $id_keluarga . "<br>";


  $query_mutasi = "INSERT INTO mutasi_masuk (id_pdd, id_kk, rt_masuk,rw_masuk,alamat_asal,tanggal_pindah,alasan_pindah) VALUES('$id_pdd','$id_keluarga','$rt','$rw','$alamat_asal','$tanggal_pindah','$alasan_pindah')";
  $hasil = mysqli_query($db, $query_mutasi);

  //cek keberhasilan pendambahan data
  if ($hasil_kk == true) {
    echo "<script>window.alert('Tambah mutasi berhasil'); window.location.href='../mutasi-datang/index.php'</script>";
  } else {
    echo "<script>window.alert('Tambah mutasi gagal!'); history.back()</script>";
  }
}
