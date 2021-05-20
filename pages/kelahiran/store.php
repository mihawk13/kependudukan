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
$nama_bayi = htmlspecialchars($_POST['nama_bayi']);
$jk = htmlspecialchars($_POST['jk']);
$tgl_kelahiran = htmlspecialchars($_POST['tgl_kelahiran']);
$berat_bayi = htmlspecialchars($_POST['berat_bayi']);
$panjang_bayi = htmlspecialchars($_POST['panjang_bayi']);
//$is_kembar = htmlspecialchars($_POST['is_kembar']);
$nama_kepala_keluarga = htmlspecialchars($_POST['nama_kepala_keluarga']);
$id_keluarga = htmlspecialchars($_POST['id_keluarga']);
$no_kk = htmlspecialchars($_POST['no_kk']);
$nama_kk = htmlspecialchars($_POST['nama_kk']);
$nama_ayah = htmlspecialchars($_POST['nama_ayah']);
$nama_ibu = htmlspecialchars($_POST['nama_ibu']);
$lokasi_lahir = htmlspecialchars($_POST['lokasi_lahir']);
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
$penolong = htmlspecialchars($_POST['penolong']);
$nik_sementara = uniqid();
// untuk table penduduk
$alamat_kk = htmlspecialchars($_POST['alamat_kk']);
$desa_kk = htmlspecialchars($_POST['desa_kk']);
$rt_kk = htmlspecialchars($_POST['rw_kk']);
$rw_kk = htmlspecialchars($_POST['rt_kk']);

$query2 = "INSERT INTO penduduk (id_pdd, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_ktp, alamat, desa_kelurahan, kecamatan, kabupaten_kota, provinsi, negara, rt, rw, agama, pendidikan_terakhir, pekerjaan, status) VALUES ('$id_pdd', '$nik_sementara', '$nama_bayi', '$tempat_lahir', '$tgl_kelahiran', '$jk', '$alamat_kk', '$alamat_kk', '$desa_kk', 'Ruteng', 'Manggarai', 'Nusa Tenggara Timur', 'INDONESIA', '$rt_kk', '$rw_kk', 'Kristen', '-', '-', 'Belum Kawin');";


$hasil2 = mysqli_query($db, $query2);


$query = "INSERT INTO tbl_kelahiran (id_kelahiran, tgl_kelahiran, nama_bayi, jk, berat_bayi, panjang_bayi, nama_ayah, nama_ibu, lokasi_lahir, tempat_lahir, id_keluarga, penolong, id_pdd) VALUES ('NULL','$tgl_kelahiran','$nama_bayi', '$jk','$berat_bayi','$panjang_bayi','$nama_ayah','$nama_ibu','$lokasi_lahir','$tempat_lahir','$id_keluarga','$penolong','$id_pdd')";

$sql = "INSERT INTO penduduk_has_kartu_keluarga (id_pdd, id_keluarga) VALUES ('$id_pdd','$id_keluarga')";
$sql_exe = mysqli_query($db, $sql);

$hasil = mysqli_query($db, $query);


// cek keberhasilan pendambahan data
if ($hasil == true) {
	echo "<script>window.alert('Tambah data kelahiran dan penduduk berhasil'); window.location.href='../kelahiran/index.php'</script>";
} else {
	echo "<script>window.alert('Tambah data gagal!'); window.history.back()'</script>";
	echo mysqli_error($db);
}
