USE `penduduk`;

ALTER TABLE `penduduk`.`penduduk` CHANGE `status` `status_perkawinan` ENUM('Kawin','Belum Kawin') CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, ADD COLUMN `status_kependudukan` ENUM('Penduduk Asli','Pindahan','Keluar', 'Meninggal') NULL AFTER `status_perkawinan`; 
ALTER TABLE `penduduk`.`mutasi_keluar` DROP COLUMN `jenis_pindah`;
ALTER TABLE `penduduk`.`mutasi_masuk` DROP COLUMN `jenis_kepindahan`; 
ALTER TABLE `penduduk`.`user` DROP COLUMN `desa_kelurahan_user`, DROP COLUMN `kecamatan_user`, DROP COLUMN `kabupaten_kota_user`, DROP COLUMN `provinsi_user`, DROP COLUMN `negara_user`, DROP COLUMN `rt_user`, DROP COLUMN `rw_user`, CHANGE `id_user` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `nama_user` `nama` VARCHAR(45) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `username_user` `username` VARCHAR(20) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `password_user` `password` VARCHAR(32) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `keterangan_user` `keterangan` TEXT CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `status_user` `status` ENUM('Admin','Lurah') CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL; 
