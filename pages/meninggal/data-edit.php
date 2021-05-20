<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_kelahiran = $_GET['id_kelahiran'];

// ambil dari database
$query = "SELECT * FROM tbl_kelahiran WHERE id_kelahiran = $get_id_kelahiran";

$hasil = mysqli_query($db, $query);

$data_kelahiran = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kelahiran[] = $row;
}
// ambil data KK

$query_keluarga = "SELECT penduduk.nama, kartu_keluarga.nomor_keluarga, kartu_keluarga.id_keluarga, tbl_kelahiran.id_kelahiran FROM penduduk JOIN kartu_keluarga ON penduduk.id_pdd=kartu_keluarga.id_kepala_keluarga JOIN tbl_kelahiran WHERE kartu_keluarga.id_keluarga=tbl_kelahiran.id_keluarga AND tbl_kelahiran.id_kelahiran=$get_id_kelahiran ";

$hasil_keluarga = mysqli_query($db, $query_keluarga);

$data_keluarga = array();

while ($row_keluarga = mysqli_fetch_assoc($hasil_keluarga)){
	$data_keluarga[] = $row_keluarga;
}
