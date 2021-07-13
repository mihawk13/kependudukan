<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Mutasi Keluar</h1>
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
      <th>Usia</th>
      <th>Pekerjaan</th>
      <th>Alasan Pindah</th>
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
        <!-- <td>
        <?php echo ($mutasi['tanggal_lahir_mutasi'] != '0000-00-00') ? date('d-m-Y', strtotime($mutasi['tanggal_lahir_mutasi'])) : '' ?>
      </td> -->
        <td><?php echo $mutasi['usia_mutasi'] ?></td>
        <td><?php echo $mutasi['pekerjaan'] ?></td>
        <td><?php echo $mutasi['alasan_pindah'] ?></td>
        <td>
          <!-- Single button -->
          <?php if ($_SESSION['user']['status'] != 'Lurah') : ?>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li>
                  <a href="show.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
                </li>
                <li>
                  <a href="cetak-show.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="delete.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>" onclick="return confirm('Yakin hapus data ini?')">
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

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Mutasi</dt>
    <dd><?php echo $jumlah_mutasi_keluar['total'] ?> orang</dd>

    <dt>Jumlah Laki-laki</dt>
    <dd><?php echo $jumlah_mutasi_keluar_l['total'] ?> orang</dd>

    <dt>Jumlah Perempuan</dt>
    <dd><?php echo $jumlah_mutasi_keluar_p['total'] ?> orang</dd>

    <dt>Penduduk < 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_keluar_kd_17['total'] ?> orang</dd>

    <dt>Penduduk >= 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_keluar_ld_17['total'] ?> orang</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>