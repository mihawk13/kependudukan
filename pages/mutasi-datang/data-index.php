<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT mutasi_masuk.id_mutasi_masuk,nik,nama,jenis_kelamin,pendidikan_terakhir,pekerjaan,status_perkawinan,status, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia_mutasi FROM penduduk JOIN mutasi_masuk ON penduduk.nik = mutasi_masuk.id_pdd";

$query = "SELECT *,nik,nama,jenis_kelamin,pendidikan_terakhir,pekerjaan, status, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia_mutasi FROM penduduk JOIN mutasi_masuk ON penduduk.id_pdd = mutasi_masuk.id_pdd";

#$query= "SELECT * FROM mutasi_masuk";
$hasil = mysqli_query($db, $query);

$data_mutasi = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mutasi[] = $row;
}
