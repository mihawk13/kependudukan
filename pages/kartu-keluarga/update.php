<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$nomor_kk = htmlspecialchars($_POST['nomor_kk']);
$id_kepala_keluarga = htmlspecialchars($_POST['id_kepala_keluarga']);

$alamat_keluarga = htmlspecialchars($_POST['alamat_keluarga']);
$desa_kelurahan_keluarga = htmlspecialchars($_POST['desa_kelurahan_keluarga']);
$kecamatan_keluarga = htmlspecialchars($_POST['kecamatan_keluarga']);
$kabupaten_kota_keluarga = htmlspecialchars($_POST['kabupaten_kota_keluarga']);
$provinsi_keluarga = htmlspecialchars($_POST['provinsi_keluarga']);
$negara_keluarga = htmlspecialchars($_POST['negara_keluarga']);
$rt_keluarga = htmlspecialchars($_POST['rt_keluarga']);
$rw_keluarga = htmlspecialchars($_POST['rw_keluarga']);
$kode_pos_keluarga = htmlspecialchars($_POST['kode_pos_keluarga']);

$id_keluarga = htmlspecialchars($_POST['id_keluarga']);

$id_user = $_SESSION['user']['id_user'];

//cek NIK yang sudah terdaftar

$query_cek_kk="SELECT nomor_kk from kartu_keluarga where nomor_kk=$nomor_kk";
$query_cek_nik="SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga=$id_kepala_keluarga";
	
$cek_kk=mysqli_num_rows(mysqli_query($db, $query_cek_kk));
$cek_nik=mysqli_num_rows(mysqli_query($db, $query_cek_nik));
//echo $cek_kk."<br>";
//echo $cek_nik;
/*
if($cek_kk>0){
	echo "<script>window.alert('No Kartu Keluarga $nomor_kk sudah terdaftar !');</script>";
*/		
	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik>0){
		echo "<script>window.alert('NIK sudah terdaftar di Kartu Keluarga lain !'); window.history.back()</script>";
		} else {
		echo "<script>window.history.back()</script>";
	}
/*
} else {

	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik>0){
		echo "<script>window.alert('NIK sudah terdaftar !'); window.history.back() </script>";
		} else {
		//echo "NIK belum digunakan :)";
		echo "tinggal save database";
	/*
	}

}
*/

// masukkan ke database

$query = "UPDATE kartu_keluarga SET nomor_kk = '$nomor_kk', id_kepala_keluarga = '$id_kepala_keluarga', alamat_keluarga = '$alamat_keluarga', desa_kelurahan_keluarga = '$desa_kelurahan_keluarga', kecamatan_keluarga = '$kecamatan_keluarga', kabupaten_kota_keluarga = '$kabupaten_kota_keluarga', provinsi_keluarga = '$provinsi_keluarga', negara_keluarga = '$negara_keluarga', rt_keluarga = '$rt_keluarga', rw_keluarga = '$rw_keluarga', kode_pos_keluarga = '$kode_pos_keluarga', id_user = '$id_user', updated_at = CURRENT_TIMESTAMP WHERE kartu_keluarga.id_keluarga = $id_keluarga;";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/'</script>";
} else {
  //echo "<script>window.alert('Ubah kartu keluarga gagal!'); window.location.href='../kartu-keluarga/'</script>";
}

