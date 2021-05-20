<?php
include('../../config/koneksi.php');

// hitung penduduk
$query = "SELECT COUNT(*) AS total FROM penduduk";
$hasil = mysqli_query($db, $query);
$jumlah = mysqli_fetch_assoc($hasil);

// hitung kartu keluarga
$query_kartu_keluarga = "SELECT COUNT(*) AS total FROM kartu_keluarga";
$hasil_kartu_keluarga = mysqli_query($db, $query_kartu_keluarga);
$jumlah_kartu_keluarga = mysqli_fetch_assoc($hasil_kartu_keluarga);

// hitung mutasi
/*
$query_mutasi = "SELECT COUNT(*) AS total FROM mutasi";
$hasil_mutasi = mysqli_query($db, $query_mutasi);
$jumlah_mutasi = mysqli_fetch_assoc($hasil_mutasi);
*/
// hitung penduduk laki-laki
$query_l = "SELECT COUNT(*) AS total FROM penduduk WHERE jenis_kelamin = 'L'";
$hasil_l = mysqli_query($db, $query_l);
$jumlah_l = mysqli_fetch_assoc($hasil_l);

// hitung penduduk laki-laki
$query_p = "SELECT COUNT(*) AS total FROM penduduk WHERE jenis_kelamin = 'P'";
$hasil_p = mysqli_query($db, $query_p);
$jumlah_p = mysqli_fetch_assoc($hasil_p);

// hitung penduduk lebih dari 17 tahun
$query_ld_17 = "SELECT COUNT(*) AS total FROM penduduk WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00'";
$hasil_ld_17 = mysqli_query($db, $query_ld_17);
$jumlah_ld_17 = mysqli_fetch_assoc($hasil_ld_17);

// hitung penduduk kurang dari 17 tahun
$query_kd_17 = "SELECT COUNT(*) AS total FROM penduduk WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00'";
$hasil_kd_17 = mysqli_query($db, $query_kd_17);
$jumlah_kd_17 = mysqli_fetch_assoc($hasil_kd_17);

/*
// hitung mutasi laki-laki
$query_mutasi_l = "SELECT COUNT(*) AS total FROM mutasi WHERE jenis_kelamin_mutasi = 'L'";
$hasil_mutasi_l = mysqli_query($db, $query_mutasi_l);
$jumlah_mutasi_l = mysqli_fetch_assoc($hasil_mutasi_l);

// hitung mutasi laki-laki
$query_mutasi_p = "SELECT COUNT(*) AS total FROM mutasi WHERE jenis_kelamin_mutasi = 'P'";
$hasil_mutasi_p = mysqli_query($db, $query_mutasi_p);
$jumlah_mutasi_p = mysqli_fetch_assoc($hasil_mutasi_p);

// hitung mutasi lebih dari 17 tahun
$query_mutasi_ld_17 = "SELECT COUNT(*) AS total FROM mutasi WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir_mutasi, CURDATE()) >= 17 AND tanggal_lahir_mutasi != '0000-00-00'";
$hasil_mutasi_ld_17 = mysqli_query($db, $query_mutasi_ld_17);
$jumlah_mutasi_ld_17 = mysqli_fetch_assoc($hasil_mutasi_ld_17);

// hitung mutasi kurang dari 17 tahun
$query_mutasi_kd_17 = "SELECT COUNT(*) AS total FROM mutasi WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir_mutasi, CURDATE()) < 17 AND tanggal_lahir_mutasi != '0000-00-00'";
$hasil_mutasi_kd_17 = mysqli_query($db, $query_mutasi_kd_17);
$jumlah_mutasi_kd_17 = mysqli_fetch_assoc($hasil_mutasi_kd_17);

*/
                              //MUTASI MASUK
//hitung total mutasi
$query_mutasi = "SELECT COUNT(*) AS total FROM mutasi_masuk";
$hasil_mutasi = mysqli_query($db, $query_mutasi);
$jumlah_mutasi_masuk = mysqli_fetch_assoc($hasil_mutasi);

//hitung mutasi masuk laki-laki

$query_mutasi_l = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.nik= mutasi_masuk.id_pdd WHERE jenis_kelamin = 'L'";
$hasil_mutasi_l = mysqli_query($db, $query_mutasi_l);
$jumlah_mutasi_masuk_l = mysqli_fetch_assoc($hasil_mutasi_l);

// hitung mutasi masuk perempuan
$query_mutasi_p = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.nik= mutasi_masuk.id_pdd WHERE jenis_kelamin = 'P'";
$hasil_mutasi_p = mysqli_query($db, $query_mutasi_p);
$jumlah_mutasi_masuk_p = mysqli_fetch_assoc($hasil_mutasi_p);

// hitung mutasi lebih dari 17 tahun
$query_mutasi_ld_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.nik = mutasi_masuk.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_ld_17 = mysqli_query($db, $query_mutasi_ld_17);
$jumlah_mutasi_masuk_ld_17 = mysqli_fetch_assoc($hasil_mutasi_ld_17);

// hitung mutasi kurang dari 17 tahun
$query_mutasi_kd_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.nik = mutasi_masuk.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_kd_17 = mysqli_query($db, $query_mutasi_kd_17);
$jumlah_mutasi_masuk_kd_17 = mysqli_fetch_assoc($hasil_mutasi_kd_17);


                              //MUTASI keluar
//hitung total mutasi
$query_mutasi = "SELECT COUNT(*) AS total FROM mutasi_keluar";
$hasil_mutasi = mysqli_query($db, $query_mutasi);
$jumlah_mutasi_keluar = mysqli_fetch_assoc($hasil_mutasi);

//hitung mutasi masuk laki-laki

$query_mutasi_l = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.nik= mutasi_keluar.id_pdd WHERE jenis_kelamin = 'L'";
$hasil_mutasi_l = mysqli_query($db, $query_mutasi_l);
$jumlah_mutasi_keluar_l = mysqli_fetch_assoc($hasil_mutasi_l);

// hitung mutasi masuk perempuan
$query_mutasi_p = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.nik= mutasi_keluar.id_pdd WHERE jenis_kelamin = 'P'";
$hasil_mutasi_p = mysqli_query($db, $query_mutasi_p);
$jumlah_mutasi_keluar_p = mysqli_fetch_assoc($hasil_mutasi_p);

// hitung mutasi lebih dari 17 tahun
$query_mutasi_ld_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.nik = mutasi_keluar.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_ld_17 = mysqli_query($db, $query_mutasi_ld_17);
$jumlah_mutasi_keluar_ld_17 = mysqli_fetch_assoc($hasil_mutasi_ld_17);

// hitung mutasi kurang dari 17 tahun
$query_mutasi_kd_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.nik = mutasi_keluar.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_kd_17 = mysqli_query($db, $query_mutasi_kd_17);
$jumlah_mutasi_keluar_kd_17 = mysqli_fetch_assoc($hasil_mutasi_kd_17);