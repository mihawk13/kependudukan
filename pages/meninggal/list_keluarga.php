<?php
include('../../config/koneksi.php');

// ambil dari url

//ambil data kk
$query_keluarga = "SELECT penduduk.nama, kartu_keluarga.nomor_kk FROM penduduk JOIN kartu_keluarga ON penduduk.id_pdd=kartu_keluarga.id_kepala_keluarga ";

$hasil_keluarga = mysqli_query($db, $query_keluarga);

$data_keluarga = array();

while ($row_keluarga = mysqli_fetch_assoc($hasil_keluarga)){
	$data_keluarga[] = $row_keluarga;
}

//ambil penduduk
 $query = "SELECT nama,nik,id_pdd FROM penduduk WHERE status<>'Meninggal'";
# $query = "SELECT penduduk.nama, penduduk.nik, penduduk.id_pdd FROM penduduk JOIN tbl_meninggal WHERE penduduk.id_pdd<>tbl_meninggal.id_pdd";

$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)){
	$data[] = $row;
}
/*
//ambil ibu
$query_ibu = "SELECT nama,nik,id_pdd FROM `penduduk`WHERE jenis_kelamin = 'p'";

$hasil_ibu = mysqli_query($db, $query_ibu);

$data_ibu = array();

while ($row_ibu = mysqli_fetch_assoc($hasil_ibu)){
	$data_ibu[] = $row_ibu;
}

//ambil ayah
$query_ayah = "SELECT nama,nik,id_pdd FROM `penduduk`WHERE jenis_kelamin = 'l'";

$hasil_ayah = mysqli_query($db, $query_ayah);

$data_ayah = array();

while ($row_ayah = mysqli_fetch_assoc($hasil_ayah)){
	$data_ayah[] = $row_ayah;
}
*/



