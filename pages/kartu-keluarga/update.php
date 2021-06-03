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

// $query_cek_kk = "SELECT nomor_kk from kartu_keluarga where id_keluarga = '$id_kk'";
// $query_cek_nik = "SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga = '$id_kepala_keluarga'";

// $cek_kk = mysqli_num_rows(mysqli_query($db, $query_cek_kk));
// $cek_nik = mysqli_num_rows(mysqli_query($db, $query_cek_nik));

// # cek NIK terdaftar di no kk yang belum terdaftar 
// if ($cek_nik > 0) {
// 	echo "<script>window.alert('NIK sudah terdaftar di Kartu Keluarga lain !'); window.history.back()</script>";
// } else {
// 	echo "<script>window.history.back()</script>";
// }


if ($_FILES["kk"]["size"] > 0) {
	$ext = strtolower(pathinfo($_FILES["kk"]["name"], PATHINFO_EXTENSION)); // upload file ext
	$target_file = "photo_kk/" . $nomor_kk . '.' . $ext;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["kk"]["tmp_name"]);
	if ($check !== false) {
		$uploadOk = 1;
	} else {
		echo "<script>window.alert('Format file kartu kaluarga yang diupload tidak disupport!'); history.back()</script>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 1) {
		if (move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file)) {
			$query = "UPDATE kartu_keluarga SET photo_kk = '$target_file', nomor_kk = '$nomor_kk', id_kepala_keluarga = '$id_kepala_keluarga' WHERE id_keluarga = '$id_kk'";

			$hasil = mysqli_query($db, $query);

			// cek keberhasilan pendambahan data
			if ($hasil == true) {
				echo "<script>window.alert('Ubah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/'</script>";
			} else {
				echo "<script>window.alert('Ubah kartu keluarga gagal!'); window.location.href='../kartu-keluarga/'</script>";
			}
		} else {
			echo "<script>window.alert('Maaf terjadi kesalahan saat upload photo kartu keluarga!'); history.back()</script>";
		}
	}
} else {
	$query = "UPDATE kartu_keluarga SET nomor_kk = '$nomor_kk', id_kepala_keluarga = '$id_kepala_keluarga' WHERE id_keluarga = '$id_kk'";

	$hasil = mysqli_query($db, $query);

	// cek keberhasilan pendambahan data
	if ($hasil == true) {
		echo "<script>window.alert('Ubah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/'</script>";
	} else {
		echo "<script>window.alert('Ubah kartu keluarga gagal!'); window.location.href='../kartu-keluarga/'</script>";
	}
}
