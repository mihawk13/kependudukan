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
$id_meninggal = htmlspecialchars($_POST['id_meninggal']);
$id_pdd = $_POST['id_pdd'];
$nama = htmlspecialchars($_POST['nama']);
$NIK = htmlspecialchars($_POST['NIK']);
$tgl_kematian = htmlspecialchars($_POST['tgl_kematian']);
$penyebab = htmlspecialchars($_POST['penyebab_kematian']);
$tempat_kematian = htmlspecialchars($_POST['tempat_kematian']);
$pelapor = htmlspecialchars($_POST['pelapor']);
$hub_pelapor = htmlspecialchars($_POST['hub_pelapor']);

$query="UPDATE tbl_meninggal SET tgl_meninggal ='$tgl_kematian', sebab='$penyebab', id_pdd='$id_pdd', tempat_kematian='$tempat_kematian', nama_pelapor='$pelapor', hubungan_pelapor='$hub_pelapor' WHERE id_meninggal= '$id_meninggal'";

$query2="UPDATE penduduk SET status_kependudukan = 'Meninggal' WHERE id_pdd = $id_pdd";

mysqli_query($db, $query);
$hasil = mysqli_query($db, $query2);

if ($hasil == TRUE){
	echo "<script>window.alert('Ubah data kematian berhasil'); window.location.href='../meninggal/index.php'</script>";
} else {
	echo "<script>window.alert('Ubah data gagal!'); window.history.back()'</script>";
  		echo mysqli_error($db);
 }
