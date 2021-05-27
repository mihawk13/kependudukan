<?php
session_start();
if (!isset($_SESSION['user'])) {
	// jika user belum login
	header('Location: ../login');
	exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_pdd = htmlspecialchars($_POST['id_pdd']);
$id_keluarga = htmlspecialchars($_POST['id_keluarga']);


//cek NIK yang sudah terdaftar

//$query_cek_nik="SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga=$id_kepala_keluarga";
$query_cek_anggota = "SELECT COUNT(*) AS jumlah from penduduk_has_kartu_keluarga where id_pdd=$id_pdd";
$cek_anggota = mysqli_query($db, $query_cek_anggota);
$jml = mysqli_fetch_assoc($cek_anggota);

$query_cek_nik = "SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga=$id_pdd";

$cek_nik = mysqli_num_rows(mysqli_query($db, $query_cek_nik));

# cek NIK terdaftar di no kk yang belum terdaftar 
if ($cek_nik > 0) {
	echo "<script>window.alert('Penduduk sudah terdaftar di Kartu Keluarga lain !'); window.history.back()</script>";
} else {
	if ($jml['jumlah'] != 0) {
		echo "<script>window.alert('Penduduk sudah terdaftar di Kartu Keluarga lain !'); window.history.back()</script>";
	} else {
		$query_cek = "SELECT COUNT(*) AS total FROM penduduk_has_kartu_keluarga WHERE id_pdd = $id_pdd AND id_keluarga = $id_keluarga";
		$hasil_cek = mysqli_query($db, $query_cek);
		$jumlah_cek = mysqli_fetch_assoc($hasil_cek);

		//echo $jumlah_cek['total'];
		//echo $jumlah_cek;

		if ($jumlah_cek['total'] != 0) {
			//if ($jumlah_cek > 0) {
			echo "<script>window.alert('Penduduk sudah menjadi anggota!'); window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";
			//exit;
		} else {
			// tambahkan ke pivot database
			$query = "INSERT INTO penduduk_has_kartu_keluarga (id_pdd, id_keluarga) VALUES ('$id_pdd', '$id_keluarga');";
			//echo $query;
			$hasil = mysqli_query($db, $query);

			// cek keberhasilan pendambahan data
			if ($hasil == true) {
				echo "<script>window.alert('Anggota sukses ditambahkan !'); window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";
			} else {
				//echo "<script>window.alert('Gagal menambahkan anggota atau!'); window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";  				
				echo "<script>window.alert('Penduduk sudah terdaftar di Kartu Keluarga lain !'); window.location.href='../kartu-keluarga/edit-anggota.php?id_keluarga=$id_keluarga'</script>";
			}
		}
	}
} //akhir statment cek_nik yang terdaftar di tabel kartu_keluarga 