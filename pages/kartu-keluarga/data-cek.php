<?php
include('../../config/koneksi.php');

$query="SELECT penduduk.id_pdd, penduduk.nik, penduduk.nama, kartu_keluarga.nomor_kk, kartu_keluarga.id_kepala_keluarga FROM penduduk JOIN kartu_keluarga WHERE kartu_keluarga.id_kepala_keluarga=penduduk.id_pdd";

$query_exe=mysqli_query($db, $query);
$data_cek=array();

while ($param_cek=mysqli_fetch_array($query_exe)) {
	$data_cek[]=$param_cek;
}
?>