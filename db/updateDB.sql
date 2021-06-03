USE `penduduk`;

ALTER TABLE `penduduk`.`penduduk` ADD COLUMN `ktp` VARCHAR(100) DEFAULT '0' NULL AFTER `status_kependudukan`; 
ALTER TABLE `penduduk`.`kartu_keluarga` ADD COLUMN `photo_kk` VARCHAR(100) DEFAULT '0' NULL AFTER `id_kepala_keluarga`; 
