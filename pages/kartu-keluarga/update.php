<?php
session_start();
if (!isset($_SESSION['user'])) {
	// jika user belum login
	header('Location: ../login');
	exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_kk = htmlspecialchars($_POST['id_kk']);
$nomor_kk = htmlspecialchars($_POST['nomor_kk']);
$id_kepala_keluarga = htmlspecialchars($_POST['id_kepala_keluarga']);

//cek NIK yang sudah terdaftar

$query_cek_kk = "SELECT nomor_kk from kartu_keluarga where id_keluarga = '$id_kk'";
$query_cek_nik = "SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga = '$id_kepala_keluarga'";

$cek_kk = mysqli_num_rows(mysqli_query($db, $query_cek_kk));
$cek_nik = mysqli_num_rows(mysqli_query($db, $query_cek_nik));

# cek NIK terdaftar di no kk yang belum terdaftar 
if ($cek_nik > 0) {
	echo "<script>window.alert('NIK sudah terdaftar di Kartu Keluarga lain !'); window.history.back()</script>";
} else {
	echo "<script>window.history.back()</script>";
}


// masukkan ke database

$query = "UPDATE kartu_keluarga SET nomor_kk = '$nomor_kk', id_kepala_keluarga = '$id_kepala_keluarga' WHERE id_keluarga = '$id_keluarga'";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
	echo "<script>window.alert('Ubah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/'</script>";
} else {
	//echo "<script>window.alert('Ubah kartu keluarga gagal!'); window.location.href='../kartu-keluarga/'</script>";
}
