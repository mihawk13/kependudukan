<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia FROM penduduk";


//get by id
$query = "SELECT * FROM tbl_kelahiran WHERE id_kelahiran = $id_kelahiran";

$hasil = mysqli_query($db, $query);

$data_lahir = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_lahir[] = $row;
}

