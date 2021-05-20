<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT mutasi_keluar.id_mutasi,nik,nama,jenis_kelamin,pendidikan_terakhir,pekerjaan, STATUS, alasan_pindah, tanggal_pindah, alamat_mutasi, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia_mutasi FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd = mutasi_keluar.id_pdd";

$hasil = mysqli_query($db, $query);

$data_mutasi = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mutasi[] = $row;
}