<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia FROM penduduk";
# $query = "SELECT * FROM tbl_meninggal";
$query = "SELECT *, penduduk.nama, penduduk.jenis_kelamin FROM `tbl_meninggal` JOIN penduduk on penduduk.id_pdd=tbl_meninggal.id_pdd";
$hasil = mysqli_query($db, $query);

$data_kematian = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kematian[] = $row;
}

// hitung kelahiran
$query_jumlah_kematian = "SELECT COUNT(*) AS total FROM tbl_meninggal";
$hasil_jumlah_kematian = mysqli_query($db, $query_jumlah_kematian);
$jumlah_kematian = mysqli_fetch_assoc($hasil_jumlah_kematian);

