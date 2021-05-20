<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia FROM penduduk";


//get by id
$id_kematian = $_GET['id_kematian'];
$query = "SELECT *, penduduk.nama, penduduk.jenis_kelamin FROM `tbl_meninggal` JOIN penduduk on penduduk.id_pdd=tbl_meninggal.id_pdd WHERE id_meninggal ='$id_kematian'";
$hasil = mysqli_query($db, $query);

$datakmt = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $datakmt[] = $row;
}