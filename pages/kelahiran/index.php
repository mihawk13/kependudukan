<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kelahiran</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>
<?php include('../dasbor/data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal Lahir</th>
      <th>Nama Bayi</th>
      <th>Jenis Kelamin</th>
      <th>Berat Bayi</th>
      <th>Panjang Bayi</th>
      <th>Nama Ayah</th>
      <th>Nama Ibu</th>
      <th>Tempat Lahir</th>
      <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
      <th>Aksi</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_lahir as $kelahiran) : ?>
      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo ($kelahiran['tgl_kelahiran'] != '0000-00-00') ? date('d-m-Y', strtotime($kelahiran['tgl_kelahiran'])) : '' ?></td>
        <td><?php echo $kelahiran['nama_bayi'] ?></td>
        <td><?php echo $kelahiran['jk'] ?></td>
        <td><?php echo $kelahiran['berat_bayi'] ?></td>
        <td><?php echo $kelahiran['panjang_bayi'] ?></td>
        <td><?php echo $kelahiran['nama_ayah'] ?></td>
        <td><?php echo $kelahiran['nama_ibu'] ?></td>
        <td><?php echo $kelahiran['tempat_lahir'] ?></td>
        <td>
          <!-- Single button -->
          <?php if ($_SESSION['user']['status'] != 'Lurah') : ?>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li>
                  <a href="cetak-show.php?id_kelahiran=<?php echo $kelahiran['id_kelahiran'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                </li>

                <li class="divider"></li>
                <li>
                  <a href="edit.php?id_kelahiran=<?php echo $kelahiran['id_kelahiran'] ?>"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
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
<br><br>

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Kelahiran</dt>
    <dd><?php echo $jumlah_kelahiran['total'] ?></dd>
  </dl>
</div>
<?php include('../_partials/bottom.php') ?>