<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_pdd = $_GET['id_pdd'];

// ambil dari database
$query = "SELECT * FROM warga WHERE id_pdd = $get_id_pdd";
# $query_kk = "SELECT * FROM warga JOIN kartu_keluarga ON warga.id_pdd=kartu_keluarga.id_kepala_keluarga WHERE warga.id_pdd=$get_id_pdd";

 $query_kk = "SELECT * FROM warga left JOIN warga_has_kartu_keluarga ON warga_has_kartu_keluarga.id_pdd=warga.id_pdd JOIN kartu_keluarga on kartu_keluarga.id_keluarga=warga_has_kartu_keluarga.id_keluarga WHERE warga.id_pdd=$get_id_pdd";

#$query_kk = "SELECT * FROM warga left JOIN warga_has_kartu_keluarga ON warga_has_kartu_keluarga.id_pdd=warga.id_pdd WHERE warga.id_pdd=$get_id_pdd";

$hasil = mysqli_query($db, $query);
$hasil_kk = mysqli_query($db, $query_kk);

$data_warga = array();
$data_kk = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_warga[] = $row;
}

while ($row = mysqli_fetch_assoc($hasil_kk)) {
  $data_kk[] = $row;
}
