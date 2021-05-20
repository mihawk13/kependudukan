<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_mutasi = $_GET['id_mutasi'];

// ambil dari database
$query = "SELECT * FROM mutasi_keluar JOIN penduduk ON mutasi_keluar.id_pdd = penduduk.id_pdd WHERE id_mutasi = $get_id_mutasi";


$hasil = mysqli_query($db, $query);

$data_mutasi = array();

while ($row = mysqli_fetch_assoc($hasil)) {
 $data_mutasi[] = $row;
}

//ambil dari penduduk
$query = "SELECT * FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd = mutasi_keluar.id_pdd WHERE mutasi_keluar.id_mutasi = $get_id_mutasi";

$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}
