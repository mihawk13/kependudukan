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
$id_pdd = htmlspecialchars($_POST['id_pdd']);
$nama = htmlspecialchars($_POST['nama']);
$NIK = htmlspecialchars($_POST['NIK']);
$tgl_kematian = htmlspecialchars($_POST['tgl_kematian']);
$penyebab = htmlspecialchars($_POST['penyebab_kematian']);
$tempat_kematian = htmlspecialchars($_POST['tempat_kematian']);
$pelapor = htmlspecialchars($_POST['pelapor']);
$hub_pelapor = htmlspecialchars($_POST['hub_pelapor']);


$query="INSERT INTO tbl_meninggal (tgl_meninggal, sebab, id_pdd, tempat_kematian, nama_pelapor, hubungan_pelapor) VALUES 
('$tgl_kematian','$penyebab','$id_pdd','$tempat_kematian','$pelapor','$hub_pelapor')";

# echo "<br>".$query;

$query2 = "UPDATE penduduk SET status_kependudukan = 'Meninggal' WHERE id_pdd = '$id_pdd'";

# echo "<br>".$query2;


$query_exe=mysqli_query($db, $query);
$query_exe2=mysqli_query($db, $query2);

if ($query_exe2 == TRUE){
	echo "<script>window.alert('Tambah data kematian berhasil'); window.location.href='../meninggal/index.php'</script>";
} else {
	echo "<script>window.alert('Tambah data gagal!'); window.history.back()'</script>";
  		echo mysqli_error($db);
 }
?>