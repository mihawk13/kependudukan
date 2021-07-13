<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Penduduk</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>
<?php include('../dasbor/data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>NIK</th>
      <th>Nama Penduduk</th>
      <th>L/P</th>
      <!-- <th>Lahir</th> -->
      <th>Usia</th>
      <th>Pendidikan</th>
      <th>Pekerjaan</th>
      <th>Status Kependudukan</th>
      <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
      <th>Aksi</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data as $pdd) : ?>
      <tr>
        <td><?= $nomor++ ?>.</td>
        <td><?= $pdd['nik'] ?></td>
        <td><?= $pdd['nama'] ?></td>
        <td><?= $pdd['jenis_kelamin'] ?></td>
        <td><?= $pdd['usia'] ?></td>
        <td><?= $pdd['pendidikan_terakhir'] ?></td>
        <td><?= $pdd['pekerjaan'] ?></td>
        <td><?= $pdd['status_kependudukan'] ?></td>
        <td>
          <!-- Single button -->
          <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <?php
              if ($pdd['ktp'] !== '0') { ?>
                <li>
                  <a target="_blank" href="<?= $pdd['ktp'] ?>"><i class="glyphicon glyphicon-picture"></i> Lihat KTP</a>
                </li>
              <?php } ?>
              <li>
                <a href="show.php?id_pdd=<?= $pdd['id_pdd'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
              </li>
              <li>
                <a href="cetak-show.php?id_pdd=<?= $pdd['id_pdd'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
              </li>

              <li class="divider"></li>
              <li>
                <a href="edit.php?id_pdd=<?= $pdd['id_pdd'] ?>"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
              </li>
              <li>
                <a href="delete.php?id_pdd=<?= $pdd['id_pdd'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                  <i class="glyphicon glyphicon-trash"></i> Hapus
                </a>
              </li>
            </ul>
          </div>
          <?php } ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Penduduk</dt>
    <dd><?= $jumlah['total'] ?> orang</dd>

    <dt>Jumlah Laki-laki</dt>
    <dd><?= $jumlah_l['total'] ?> orang</dd>

    <dt>Jumlah Perempuan</dt>
    <dd><?= $jumlah_p['total'] ?> orang</dd>

    <dt>Penduduk < 17 tahun</dt>
    <dd><?= $jumlah_kd_17['total'] ?> orang</dd>

    <dt>Penduduk >= 17 tahun</dt>
    <dd><?= $jumlah_ld_17['total'] ?> orang</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>