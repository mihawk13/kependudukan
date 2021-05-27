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
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data as $pdd) : ?>
      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo $pdd['nik'] ?></td>
        <td><?php echo $pdd['nama'] ?></td>
        <td><?php echo $pdd['jenis_kelamin'] ?></td>
        <!-- <td>
        <?php echo ($pdd['tanggal_lahir'] != '0000-00-00') ? date('d-m-Y', strtotime($pdd['tanggal_lahir'])) : '' ?>
      </td> -->
        <td><?php echo $pdd['usia'] ?></td>
        <td><?php echo $pdd['pendidikan_terakhir'] ?></td>
        <td><?php echo $pdd['pekerjaan'] ?></td>
        <td><?php echo $pdd['status_kependudukan'] ?></td>
        <td>
          <!-- Single button -->
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">

              <li class="divider"></li>
              <li>
                <a href="show.php?id_pdd=<?php echo $pdd['id_pdd'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
              </li>
              <li>
                <a href="cetak-show.php?id_pdd=<?php echo $pdd['id_pdd'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
              </li>
              <?php if ($_SESSION['user']['status'] != 'RW') : ?>
                <li class="divider"></li>
                <li>
                  <a href="edit.php?id_pdd=<?php echo $pdd['id_pdd'] ?>"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
                </li>
                <!-- <li>
              <a href="../mutasi/create.php?id_pdd=<?php echo $pdd['id_pdd'] ?>"><i class="glyphicon glyphicon-export"></i> Mutasi</a>
            </li>
            <li class="divider"></li> -->

                <li>
                  <a href="delete.php?id_pdd=<?php echo $pdd['id_pdd'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                    <i class="glyphicon glyphicon-trash"></i> Hapus
                  </a>
                </li>

              <?php endif; ?>
            </ul>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Penduduk</dt>
    <dd><?php echo $jumlah['total'] ?> orang</dd>

    <dt>Jumlah Laki-laki</dt>
    <dd><?php echo $jumlah_l['total'] ?> orang</dd>

    <dt>Jumlah Perempuan</dt>
    <dd><?php echo $jumlah_p['total'] ?> orang</dd>

    <dt>Penduduk < 17 tahun</dt>
    <dd><?php echo $jumlah_kd_17['total'] ?> orang</dd>

    <dt>Penduduk >= 17 tahun</dt>
    <dd><?php echo $jumlah_ld_17['total'] ?> orang</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>