<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_pdd = $_GET['id_pdd'];

// ambil dari database
$query = "SELECT * FROM penduduk WHERE id_pdd = $get_id_pdd";
# $query_kk = "SELECT * FROM penduduk JOIN kartu_keluarga ON penduduk.id_pdd=kartu_keluarga.id_kepala_keluarga WHERE penduduk.id_pdd=$get_id_pdd";

 $query_kk = "SELECT * FROM penduduk left JOIN penduduk_has_kartu_keluarga ON penduduk_has_kartu_keluarga.id_pdd=penduduk.id_pdd JOIN kartu_keluarga on kartu_keluarga.id_keluarga=penduduk_has_kartu_keluarga.id_keluarga WHERE penduduk.id_pdd=$get_id_pdd";

#$query_kk = "SELECT * FROM penduduk left JOIN penduduk_has_kartu_keluarga ON penduduk_has_kartu_keluarga.id_pdd=penduduk.id_pdd WHERE penduduk.id_pdd=$get_id_pdd";

$hasil = mysqli_query($db, $query);
$hasil_kk = mysqli_query($db, $query_kk);

$data = array();
$data_kk = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}

while ($row = mysqli_fetch_assoc($hasil_kk)) {
  $data_kk[] = $row;
}
