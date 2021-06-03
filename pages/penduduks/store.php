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

//cek nik penduduk dari database apakah ada atau tidak

$query_cek = "SELECT nik FROM penduduk where nik = '$nik'";
$hasil = mysqli_query($db, $query_cek);
$cek_nik = mysqli_num_rows($hasil);
if ($cek_nik) {
	echo "<script>window.alert('Tambah penduduk gagal!, NIK $nik sudah digunakan !'); history.back()</script>";
} else {
// masukkan ke database

// $target_dir = "ktp/";
$ext = strtolower(pathinfo($_FILES["ktp"]["name"], PATHINFO_EXTENSION)); //end(explode('.', $_FILES["ktp"]["name"])); // upload file ext
$target_file = "ktp/" . $nik . '.' . $ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["ktp"]["tmp_name"]);
if ($check !== false) {
	$uploadOk = 1;
} else {
	echo "<script>window.alert('Format file KTP yang diupload tidak disupport!'); history.back()</script>";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
	if (move_uploaded_file($_FILES["ktp"]["tmp_name"], $target_file)) {
		$query = "INSERT INTO penduduk (id_pdd, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_ktp, alamat, desa_kelurahan, kecamatan, kabupaten_kota, provinsi, negara, rt, rw, agama, pendidikan_terakhir, pekerjaan, status_perkawinan, status_kependudukan, ktp) VALUES (NULL, '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat_ktp', '$alamat', '$desa_kelurahan', '$kecamatan', '$kabupaten_kota', '$provinsi', '$negara', '$rt', '$rw', '$agama', '$pendidikan_terakhir', '$pekerjaan', '$status', 'Penduduk Asli', '$target_file');";

		$hasil = mysqli_query($db, $query);

		//cek keberhasilan pendambahan data
		if ($hasil == true) {
			echo "<script>window.alert('Tambah penduduk berhasil'); window.location.href='../penduduks/index.php'</script>";
		} else {
			echo "<script>window.alert('Tambah penduduk gagal!'); history.back()</script>";
		}
		// echo "<script>window.alert('berhasil upload!'); history.back()</script>";
	} else {
		echo "<script>window.alert('Maaf terjadi kesalahan saat upload KTP!'); history.back()</script>";
	}
}
}
