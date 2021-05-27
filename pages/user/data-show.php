<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_pdd = $_GET['id'];

// ambil dari database
$query = "SELECT * FROM user WHERE id = $get_id_pdd";

$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}

