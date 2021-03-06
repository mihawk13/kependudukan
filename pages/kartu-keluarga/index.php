<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kartu Keluarga</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Nomor KK</th>
      <th>Kepala Keluarga</th>
      <th>NIK Kepala</th>
      <th>Jml. Anggota</th>
      <th>Alamat</th>
      <th>RT</th>
      <th>RW</th>
      <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
        <th>Aksi</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_kartu_keluarga as $kartu_keluarga) : ?>

      <?php
      // hitung anggota
      $query_jumlah_anggota = "SELECT COUNT(*) AS total FROM penduduk_has_kartu_keluarga WHERE id_keluarga = " . $kartu_keluarga['id_keluarga'];
      $hasil_jumlah_anggota = mysqli_query($db, $query_jumlah_anggota);
      $jumlah_jumlah_anggota = mysqli_fetch_assoc($hasil_jumlah_anggota);
      ?>

      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo $kartu_keluarga['nomor_kk'] ?></td>
        <td><?php echo $kartu_keluarga['nama'] ?></td>
        <td><?php echo $kartu_keluarga['nik'] ?></td>
        <td><?php echo $jumlah_jumlah_anggota['total'] ?></td>
        <td><?php echo $kartu_keluarga['alamat_ktp'] ?></td>
        <td><?php echo $kartu_keluarga['rt'] ?></td>
        <td><?php echo $kartu_keluarga['rw'] ?></td>
        <?php if ($_SESSION['user']['status'] != 'Lurah') { ?>
          <td>
            <!-- Single button -->
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li>
                  <a target="_blank" href="<?= $kartu_keluarga['photo_kk'] ?>"><i class="glyphicon glyphicon-picture"></i> Lihat KK</a>
                </li>
                <li>
                  <a href="cetak-show.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="edit-anggota.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>"><span class="glyphicon glyphicon-list"></span> Tambah Anggota Keluarga</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="edit.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </li>
              </ul>
            </div>
          </td>
        <?php } ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<h4>Keterangan:</h4>
<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Kartu Keluarga</dt>
    <dd><?php echo $jumlah_kartu_keluarga['total'] ?> keluarga</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>