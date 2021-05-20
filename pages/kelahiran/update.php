<?php
session_start();
if (!isset($_SESSION['user'])) {
	// jika user belum login
	header('Location: ../login');
	exit();
}

include('../../config/koneksi.php');
# include ('data-cek.php');

// ambil data dari form

$id_kelahiran = htmlspecialchars($_POST['id_kelahiran']);
$id_pdd = htmlspecialchars($_POST['id_pdd']);
$nama_bayi = htmlspecialchars($_POST['nama_bayi']);
$jk = htmlspecialchars($_POST['jk']);
$tgl_kelahiran = htmlspecialchars($_POST['tgl_kelahiran']);
$berat_bayi = htmlspecialchars($_POST['berat_bayi']);
$panjang_bayi = htmlspecialchars($_POST['panjang_bayi']);
$no_kk = htmlspecialchars($_POST['no_kk']);
$nama_kk = htmlspecialchars($_POST['nama_kk']);
$nama_ayah = htmlspecialchars($_POST['nama_ayah']);
$nama_ibu = htmlspecialchars($_POST['nama_ibu']);
$lokasi_lahir = htmlspecialchars($_POST['lokasi_lahir']);
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
$penolong = htmlspecialchars($_POST['penolong']);

$query2 = "UPDATE penduduk SET nama = '$nama_bayi', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_kelahiran', jenis_kelamin='$jk' WHERE id_pdd = '$id_pdd'";


$hasil2 = mysqli_query($db, $query2);


$query = "UPDATE tbl_kelahiran SET tgl_kelahiran='$tgl_kelahiran', nama_bayi='$nama_bayi', jk='$jk', berat_bayi='$berat_bayi', panjang_bayi='$panjang_bayi', lokasi_lahir='$lokasi_lahir', tempat_lahir='$tempat_lahir', penolong='$penolong' WHERE id_kelahiran = '$id_kelahiran'";
$hasil = mysqli_query($db, $query);


// cek keberhasilan pendambahan data
if ($hasil == true) {
	echo "<script>window.alert('Ubah data kelahiran dan penduduk berhasil'); window.location.href='../kelahiran/index.php'</script>";
} else {
	echo "<script>window.alert('Ubah data gagal!'); window.history.back()'</script>";
	echo mysqli_error($db);
}
