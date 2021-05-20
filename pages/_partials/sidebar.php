<?php
function is_active($page)
{
  $uri = "$_SERVER[REQUEST_URI]";
  // echo $uri;
  if (strpos($uri, $page)) {
    echo 'active';
  }
}
?>
<div class="nav navbar-sidebar">
  <ul class="nav nav-sidebar">
    <?php if ($_SESSION['user']['status_user'] != 'Lurah') : ?>
      <li class="<?php is_active('dasbor'); ?>">
        <a href="../dasbor"><i class="fa fa-home"></i> Dashbord</a>
      </li>
      <li class="<?php is_active('penduduks'); ?>">
        <a href="../penduduks"><i class="fa fa-user"></i> Data Penduduk</a>
      </li>
      <li class="<?php is_active('kartu-keluarga'); ?>">
        <a href="../kartu-keluarga"><i class="fa fa-user fa-group"></i> Data Kartu Keluarga</a>
      </li>
      <li class="<?php is_active('meninggal'); ?>">
        <a href="../meninggal"><i class="fa fa-ambulance"></i> Data Kematian</a>
      </li>
      <li class="<?php is_active('kelahiran'); ?>">
        <a href="../kelahiran"><i class="fa fa-venus-mars"></i> Data Kelahiran</a>
      </li>
      <li class="<?php is_active('mutasi-datang'); ?>">
        <a href="../mutasi-datang"><i class="fa fa-long-arrow-right"></i> Data Penduduk Masuk</a>
      </li>
      <li class="<?php is_active('mutasi-keluar'); ?>">
        <a href="../mutasi-keluar"><i class="fa fa-long-arrow-left"></i> Data Penduduk Pindah</a>
      </li>
      <li class="<?php is_active('user'); ?>">
        <a href="../user"><i class="fa fa-user"></i> Data User</a>
      </li>
    <?php endif; ?>
    <?php if ($_SESSION['user']['status_user'] == 'Lurah') : ?>
      <li class="<?php is_active('meninggal'); ?>">
        <a href="../meninggal"><i class="fa fa-ambulance"></i> Laporan Kematian</a>
      </li>
      <li class="<?php is_active('kelahiran'); ?>">
        <a href="../kelahiran"><i class="fa fa-venus-mars"></i> Laporan Kelahiran</a>
      </li>
      <li class="<?php is_active('mutasi-datang'); ?>">
        <a href="../mutasi-datang"><i class="fa fa-long-arrow-right"></i> Laporan Penduduk Masuk</a>
      </li>
      <li class="<?php is_active('mutasi-keluar'); ?>">
        <a href="../mutasi-keluar"><i class="fa fa-long-arrow-left"></i> Laporan Penduduk Pindah</a>
      </li>
    <?php endif; ?>
  </ul>

</div>