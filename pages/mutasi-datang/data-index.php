<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT mutasi_masuk.id_mutasi_masuk,nik_warga,nama_warga,jenis_kelamin_warga,pendidikan_terakhir_warga,pekerjaan_warga,status_perkawinan_warga,status_warga, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_mutasi FROM warga JOIN mutasi_masuk ON warga.nik_warga = mutasi_masuk.id_pdd";

$query = "SELECT *,nik_warga,nama_warga,jenis_kelamin_warga,pendidikan_terakhir_warga,pekerjaan_warga, status_warga, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_mutasi FROM warga JOIN mutasi_masuk ON warga.id_pdd = mutasi_masuk.id_pdd";

#$query= "SELECT * FROM mutasi_masuk";
$hasil = mysqli_query($db, $query);

$data_mutasi = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mutasi[] = $row;
}
