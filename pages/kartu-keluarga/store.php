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
$query_cek_kk="SELECT nomor_kk from kartu_keluarga where nomor_kk=$nomor_kk";
$query_cek_nik="SELECT id_kepala_keluarga from kartu_keluarga WHERE id_kepala_keluarga=$id_kepala_keluarga";
	
$cek_kk=mysqli_num_rows(mysqli_query($db, $query_cek_kk));
$cek_nik=mysqli_num_rows(mysqli_query($db, $query_cek_nik));
//echo $cek_kk."<br>";
//echo $cek_nik;
if($cek_kk>0){
	echo "<script>window.alert('No Kartu Keluarga $nomor_kk sudah terdaftar !');</script>";
		
	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik>0){
		echo "<script>window.alert('NIK sudah terdaftar !'); window.history.back()</script>";
		} else {
		echo "<script>window.history.back()</script>";
	}

} else {

	# cek NIK terdaftar di no kk yang belum terdaftar 
	if ($cek_nik>0){
		echo "<script>window.alert('NIK sudah terdaftar !'); window.history.back() </script>";
		} else {
		//echo "NIK belum digunakan :)";
		//echo "tinggal save database";
	/*
	}

}
*/





	// masukkan ke database
	$query= "INSERT INTO kartu_keluarga (nomor_kk, id_kepala_keluarga) VALUES ('$nomor_kk', '$id_kepala_keluarga');";

	$hasil = mysqli_query($db, $query);

	//echo $query;
	// id terakhir

	// cek keberhasilan pendambahan data
	if ($hasil == true) {	
 		echo "<script>window.alert('Tambah kartu keluarga berhasil'); window.location.href='../kartu-keluarga/index.php'</script>";
	} else {
  		echo "<script>window.alert('Tambah kartu keluarga gagal!'); window.history.back()'</script>";
  		echo mysqli_error($db);
	}
}
}
