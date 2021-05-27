<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia FROM penduduk WHERE status_kependudukan <> 'Keluar'";

$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}
