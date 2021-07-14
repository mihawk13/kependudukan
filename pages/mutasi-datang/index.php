<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Mutasi Datang</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>
<?php include('../dasbor/data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>NIK</th>
      <th>Nama Mutasi</th>
      <th>L/P</th>
      <th>Tanggal Pindah</th>
      <th>Alasan Pindah</th>
      <th>Status</th>
      <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
        <th>Aksi</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_mutasi as $mutasi) : ?>
      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo $mutasi['nik'] ?></td>
        <td><?php echo $mutasi['nama'] ?></td>
        <td><?php echo $mutasi['jenis_kelamin'] ?></td>
        <td><?php echo $mutasi['tanggal_pindah'] ?></td>
        <td><?php echo $mutasi['alasan_pindah'] ?></td>
        <td><?php echo $mutasi['status_perkawinan'] ?></td>
        <td>
          <!-- Single button -->
          <?php if ($_SESSION['user']['status'] != 'Lurah') : ?>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">

                <li>
                  <a href="cetak-show.php?id_mutasi_masuk=<?php echo $mutasi['id_mutasi_masuk'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="delete.php?id_mutasi_masuk=<?php echo $mutasi['id_mutasi_masuk'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                    <i class="glyphicon glyphicon-trash"></i> Hapus
                  </a>
                </li>
              </ul>
            </div>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<h4>Keterangan:</h4>
<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Penduduk Masuk</dt>
    <dd><?php echo $jumlah_mutasi_masuk['total'] ?> orang</dd>

    <dt>Laki-Laki</dt>
    <dd><?php echo $jumlah_mutasi_masuk_l['total'] ?> orang</dd>

    <dt>Perempuan</dt>
    <dd><?php echo $jumlah_mutasi_masuk_p['total'] ?> orang</dd>

    <dt>Penduduk < 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_masuk_kd_17['total'] ?> orang</dd>

    <dt>Penduduk >= 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_masuk_ld_17['total'] ?> orang</dd>

    <dt>Bulan ini</dt>
    <dd><?= $jumlah_masuk_bi['total'] ?> orang</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>