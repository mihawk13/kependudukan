<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_mutasi = $_GET['id_mutasi_masuk'];

// ambil dari database
$query = "SELECT * FROM mutasi_masuk JOIN penduduk ON mutasi_masuk.id_pdd = penduduk.nik WHERE id_mutasi_masuk = $get_id_mutasi";

$hasil = mysqli_query($db, $query);

$data_mutasi = array();

while ($row = mysqli_fetch_assoc($hasil)) {
 $data_mutasi[] = $row;
}

//ambil dari penduduk
$query = "SELECT * FROM penduduk JOIN mutasi_masuk ON penduduk.nik = mutasi_masuk.id_pdd WHERE mutasi_masuk.id_mutasi_masuk = $get_id_mutasi";

$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}
