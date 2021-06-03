<?php
session_start();
if (!isset($_SESSION['user'])) {
	// jika user belum login
	header('Location: ../login');
	exit();
}

include('../../config/koneksi.php');
include('data-cek.php');

// ambil data dari form
$nomor_kk = htmlspecialchars($_POST['nomor_kk']);
$id_kepala_keluarga = htmlspecialchars($_POST['id_kepala_keluarga']);


//cek no_kk dan id_pdd yang sudah terdaftar
$query_cek_kk = "SELECT nomor_kk from kartu_keluarga where nomor_kk=$nomor_kk";
$query_cek_nik = "SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga=$id_kepala_keluarga";

$cek_kk = mysqli_num_rows(mysqli_query($db, $query_cek_kk));
$cek_nik = mysqli_num_rows(mysqli_query($db, $query_cek_nik));
//echo $cek_kk."<br>";
//echo $cek_nik;
if ($cek_kk > 0) {
	echo "<script>window.alert('No Kartu Keluarga $nomor_kk sudah terdaftar !');</script>";

	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik > 0) {
		echo "<script>window.alert('NIK sudah terdaftar !'); window.history.back()</script>";
	} else {
		echo "<script>window.history.back()</script>";
	}
} else {

	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik > 0) {
		echo "<script>window.alert('NIK sudah terdaftar !'); window.history.back() </script>";
	} else {

		// masukkan ke database

		$ext = strtolower(pathinfo($_FILES["kk"]["name"], PATHINFO_EXTENSION)); // upload file ext
		$target_file = "photo_kk/" . $nomor_kk . '.' . $ext;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["kk"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		} else {
			echo "<script>window.alert('Format photo kartu keluarga yang diupload tidak disupport!'); history.back()</script>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			if (move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file)) {

				$query = "INSERT INTO kartu_keluarga (nomor_kk, id_kepala_keluarga, photo_kk) VALUES ('$nomor_kk', '$id_kepala_keluarga', '$target_file');";

				$hasil = mysqli_query($db, $query);

				// cek keberhasilan pendambahan data
				if ($hasil == true) {
					echo "<script>window.alert('Tambah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/index.php'</script>";
				} else {
					echo "<script>window.alert('Tambah kartu keluarga gagal!'); window.history.back()'</script>";
				}
			} else {
				echo "<script>window.alert('Maaf terjadi kesalahan saat upload photo kartu keluarga!'); history.back()</script>";
			}
		}
	}
}
