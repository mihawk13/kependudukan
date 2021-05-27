<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_keluarga = $_GET['id_keluarga'];

// ambil dari database
$query = "SELECT * FROM kartu_keluarga LEFT JOIN penduduk ON kartu_keluarga.id_kepala_keluarga = penduduk.id_pdd WHERE id_keluarga = $get_id_keluarga";

$hasil = mysqli_query($db, $query);

$data_keluarga = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_keluarga[] = $row;
}

// ambil data anggota keluarga
$query_anggota = "SELECT *
from penduduk INNER JOIN penduduk_has_kartu_keluarga
ON penduduk_has_kartu_keluarga.id_pdd = penduduk.id_pdd
WHERE penduduk.status_kependudukan != 'Meninggal' AND penduduk_has_kartu_keluarga.id_keluarga = $get_id_keluarga";

$hasil_anggota = mysqli_query($db, $query_anggota);

$data_anggota_keluarga = array();

while ($row_anggota = mysqli_fetch_assoc($hasil_anggota)) {
  $data_anggota_keluarga[] = $row_anggota;
}

// data penduduk
// ambil dari database
$query = "SELECT * FROM penduduk";
$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}
