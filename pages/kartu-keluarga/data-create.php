<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT * FROM penduduk WHERE status_kependudukan <> 'Keluar'";
/*SELECT penduduk.nik, penduduk.nama from penduduk INNER JOIN kartu_keluarga WHERE penduduk.nik <> kartu_keluarga.id_kepala_keluarga

$query="SELECT penduduk.id_pdd, penduduk.nik, penduduk.nama from penduduk INNER JOIN kartu_keluarga WHERE penduduk.id_pdd <> kartu_keluarga.id_kepala_keluarga";
*/
$hasil = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}
