<?php
include('../../config/koneksi.php');

// hitung penduduk
$query = "SELECT COUNT(*) AS total FROM penduduk WHERE status_kependudukan != 'Keluar'";
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
$query_l = "SELECT COUNT(*) AS total FROM penduduk WHERE jenis_kelamin = 'L' AND status_kependudukan != 'Keluar'";
$hasil_l = mysqli_query($db, $query_l);
$jumlah_l = mysqli_fetch_assoc($hasil_l);

// hitung penduduk laki-laki
$query_p = "SELECT COUNT(*) AS total FROM penduduk WHERE jenis_kelamin = 'P' AND status_kependudukan != 'Keluar'";
$hasil_p = mysqli_query($db, $query_p);
$jumlah_p = mysqli_fetch_assoc($hasil_p);

// hitung penduduk lebih dari 17 tahun
$query_ld_17 = "SELECT COUNT(*) AS total FROM penduduk WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00' AND status_kependudukan != 'Keluar'";
$hasil_ld_17 = mysqli_query($db, $query_ld_17);
$jumlah_ld_17 = mysqli_fetch_assoc($hasil_ld_17);

// hitung penduduk kurang dari 17 tahun
$query_kd_17 = "SELECT COUNT(*) AS total FROM penduduk WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00' AND status_kependudukan != 'Keluar'";
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
                              //Penduduk Masuk
//hitung total penduduk masuk
$query_mutasi = "SELECT COUNT(*) AS total FROM mutasi_masuk";
$hasil_mutasi = mysqli_query($db, $query_mutasi);
$jumlah_mutasi_masuk = mysqli_fetch_assoc($hasil_mutasi);

//hitung mutasi masuk laki-laki
$query_mutasi_l = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.id_pdd= mutasi_masuk.id_pdd WHERE jenis_kelamin = 'L'";
$hasil_mutasi_l = mysqli_query($db, $query_mutasi_l);
$jumlah_mutasi_masuk_l = mysqli_fetch_assoc($hasil_mutasi_l);

// hitung mutasi masuk perempuan
$query_mutasi_p = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.id_pdd= mutasi_masuk.id_pdd WHERE jenis_kelamin = 'P'";
$hasil_mutasi_p = mysqli_query($db, $query_mutasi_p);
$jumlah_mutasi_masuk_p = mysqli_fetch_assoc($hasil_mutasi_p);

// hitung mutasi lebih dari 17 tahun
$query_mutasi_ld_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.id_pdd = mutasi_masuk.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_ld_17 = mysqli_query($db, $query_mutasi_ld_17);
$jumlah_mutasi_masuk_ld_17 = mysqli_fetch_assoc($hasil_mutasi_ld_17);

// hitung mutasi kurang dari 17 tahun
$query_mutasi_kd_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_masuk ON penduduk.id_pdd = mutasi_masuk.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_kd_17 = mysqli_query($db, $query_mutasi_kd_17);
$jumlah_mutasi_masuk_kd_17 = mysqli_fetch_assoc($hasil_mutasi_kd_17);
// hitung penduduk masuk bulan ini
$query = "SELECT COUNT(*) AS total FROM mutasi_masuk
WHERE MONTH(tanggal_pindah) = MONTH(CURDATE())";
$hasil = mysqli_query($db, $query);
$jumlah_masuk_bi = mysqli_fetch_assoc($hasil);

                              //Penduduk Keluar
//hitung total penduduk keluar
$query_mutasi = "SELECT COUNT(*) AS total FROM mutasi_keluar";
$hasil_mutasi = mysqli_query($db, $query_mutasi);
$jumlah_mutasi_keluar = mysqli_fetch_assoc($hasil_mutasi);

//hitung penduduk keluar laki-laki

$query_mutasi_l = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd= mutasi_keluar.id_pdd WHERE jenis_kelamin = 'L'";
$hasil_mutasi_l = mysqli_query($db, $query_mutasi_l);
$jumlah_mutasi_keluar_l = mysqli_fetch_assoc($hasil_mutasi_l);

// hitung penduduk keluar perempuan
$query_mutasi_p = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd= mutasi_keluar.id_pdd WHERE jenis_kelamin = 'P'";
$hasil_mutasi_p = mysqli_query($db, $query_mutasi_p);
$jumlah_mutasi_keluar_p = mysqli_fetch_assoc($hasil_mutasi_p);

// hitung penduduk lebih dari 17 tahun
$query_mutasi_ld_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd = mutasi_keluar.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_ld_17 = mysqli_query($db, $query_mutasi_ld_17);
$jumlah_mutasi_keluar_ld_17 = mysqli_fetch_assoc($hasil_mutasi_ld_17);

// hitung penduduk kurang dari 17 tahun
$query_mutasi_kd_17 = "SELECT COUNT(*) AS total FROM penduduk JOIN mutasi_keluar ON penduduk.id_pdd = mutasi_keluar.id_pdd WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 AND tanggal_lahir != '0000-00-00'";
$hasil_mutasi_kd_17 = mysqli_query($db, $query_mutasi_kd_17);
$jumlah_mutasi_keluar_kd_17 = mysqli_fetch_assoc($hasil_mutasi_kd_17);
// hitung penduduk keluar bulan ini
$query = "SELECT COUNT(*) AS total FROM mutasi_keluar
WHERE MONTH(tanggal_pindah) = MONTH(CURDATE())";
$hasil = mysqli_query($db, $query);
$jumlah_keluar_bi = mysqli_fetch_assoc($hasil);

                              //Kematian
//hitung total kematian
$query_kematian = "SELECT COUNT(*) AS total FROM tbl_meninggal";
$hasil_kematian = mysqli_query($db, $query_kematian);
$jumlah_kematian = mysqli_fetch_assoc($hasil_kematian);
//hitung total kematian laki-laki
$query_kematian = "SELECT COUNT(*) AS total FROM tbl_meninggal a INNER JOIN penduduk b ON a.id_pdd=b.id_pdd WHERE b.jenis_kelamin = 'L'";
$hasil_kematian = mysqli_query($db, $query_kematian);
$jumlah_kematian_l = mysqli_fetch_assoc($hasil_kematian);
//hitung total kematian laki-laki
$query_kematian = "SELECT COUNT(*) AS total FROM tbl_meninggal a INNER JOIN penduduk b ON a.id_pdd=b.id_pdd WHERE b.jenis_kelamin = 'P'";
$hasil_kematian = mysqli_query($db, $query_kematian);
$jumlah_kematian_p = mysqli_fetch_assoc($hasil_kematian);
// hitung penduduk meninggal lebih dari 17 tahun
$query_ld_17 = "SELECT COUNT(*) AS total FROM tbl_meninggal a
INNER JOIN penduduk b ON a.id_pdd=b.id_pdd
WHERE TIMESTAMPDIFF(YEAR, b.tanggal_lahir, CURDATE()) >= 17 AND b.tanggal_lahir != '0000-00-00'";
$hasil_ld_17 = mysqli_query($db, $query_ld_17);
$jumlah_kematian_ld_17 = mysqli_fetch_assoc($hasil_ld_17);
// hitung penduduk meninggal kurang dari 17 tahun
$query_kd_17 = "SELECT COUNT(*) AS total FROM tbl_meninggal a
INNER JOIN penduduk b ON a.id_pdd=b.id_pdd
WHERE TIMESTAMPDIFF(YEAR, b.tanggal_lahir, CURDATE()) < 17 AND b.tanggal_lahir != '0000-00-00'";
$hasil_kd_17 = mysqli_query($db, $query_kd_17);
$jumlah_kematian_kd_17 = mysqli_fetch_assoc($hasil_kd_17);
// hitung penduduk meninggal bulan ini
$query = "SELECT COUNT(*) AS total FROM tbl_meninggal
WHERE MONTH(tgl_meninggal) = MONTH(CURDATE())";
$hasil = mysqli_query($db, $query);
$jumlah_kematian_bi = mysqli_fetch_assoc($hasil);


                              //Kelahiran
//hitung total kelahiran
$query_kelahiran = "SELECT COUNT(*) AS total FROM tbl_kelahiran";
$hasil_kelahiran = mysqli_query($db, $query_kelahiran);
$jumlah_kelahiran = mysqli_fetch_assoc($hasil_kelahiran);
//hitung total kelahiran laki-laki
$query_kelahiran = "SELECT COUNT(*) AS total FROM tbl_kelahiran WHERE jk = 'L'";
$hasil_kelahiran = mysqli_query($db, $query_kelahiran);
$jumlah_kelahiran_l = mysqli_fetch_assoc($hasil_kelahiran);
//hitung total kelahiran laki-laki
$query_kelahiran = "SELECT COUNT(*) AS total FROM tbl_kelahiran WHERE jk = 'P'";
$hasil_kelahiran = mysqli_query($db, $query_kelahiran);
$jumlah_kelahiran_p = mysqli_fetch_assoc($hasil_kelahiran);
// hitung anak lahir bulan ini
$query = "SELECT COUNT(*) AS total FROM tbl_kelahiran
WHERE MONTH(tgl_kelahiran) = MONTH(CURDATE())";
$hasil = mysqli_query($db, $query);
$jumlah_kelahiran_bi = mysqli_fetch_assoc($hasil);