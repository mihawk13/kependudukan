<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kartu Keluarga</h1>

<?php include('data-edit-anggota.php') ?>
<a href="../kartu-keluarga" type="button" class="btn btn-info btn-sm">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</a>
<hr />
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Nomor Kartu Keluarga</th>
    <td width="1%">:</td>
    <td><?php echo $data_keluarga[0]['nomor_kk'] ?></td>
  </tr>
  <tr>
    <th>Nama Kepala Keluarga</th>
    <td>:</td>
    <td><?php echo $data_keluarga[0]['nama'] ?></td>
  </tr>
  <tr>
    <th>NIK Kepala Keluarga</th>
    <td>:</td>
    <td><?php echo $data_keluarga[0]['nik'] ?></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><?php echo $data_keluarga[0]['alamat'] ?></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td><?php echo $data_keluarga[0]['rt'] ?></td>
  </tr>
  <tr>
    <th>RW</th>
    <td>:</td>
    <td><?php echo $data_keluarga[0]['rw'] ?></td>
  </tr>
</table>

<h3>Daftar Nama Penduduk</h3>
<form action="update-anggota.php" method="post">
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Nama Penduduk</th>
      <td width="1%">:</td>
      <td>
        <select class="form-control selectlive" name="id_pdd" required>
          <option value="" selected disabled>- pilih -</option>
          <?php foreach ($data as $pdd) : ?>
            <option value="<?php echo $pdd['id_pdd'] ?>">
              <?php echo $pdd['nama'] ?> (NIK: <?php echo $pdd['nik'] ?>)
            </option>
          <?php endforeach ?>
        </select>
      </td>
    </tr>
  </table>

  <input type="hidden" name="id_keluarga" value="<?php echo $get_id_keluarga ?>">

  <button type="submit" class="btn btn-success">
    <i class="fa fa-plus-square"></i> Tambahkan
  </button>
</form>

<br><br>

<h3>Data Anggota Kartu Keluarga</h3>
<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Lahir</th>
      <th>Pendidikan</th>
      <th>Pekerjaan</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_anggota_keluarga as $anggota_keluarga) : ?>
      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo $anggota_keluarga['nik'] ?></td>
        <td><?php echo $anggota_keluarga['nama'] ?></td>
        <td><?php echo $anggota_keluarga['tempat_lahir'] ?></td>
        <td>
          <?php echo ($anggota_keluarga['tanggal_lahir'] != '0000-00-00') ? date('d-m-Y', strtotime($anggota_keluarga['tanggal_lahir'])) : '' ?>
        </td>
        <td><?php echo $anggota_keluarga['pendidikan_terakhir'] ?></td>
        <td><?php echo $anggota_keluarga['pekerjaan'] ?></td>
        <td><?php echo $anggota_keluarga['status_perkawinan'] ?></td>
        <td>
          <!-- Single button -->
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li>
                <a href="../kartu-keluarga/delete-anggota.php?id_pdd=<?php echo $anggota_keluarga['id_pdd'] ?>&id_keluarga=<?php echo $data_keluarga[0]['id_keluarga'] ?>" onclick="return confirm('Yakin hapus dari anggota?')">
                  <span class="glyphicon glyphicon-trash"></span> Hapus dari Anggota
                </a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php include('../_partials/bottom.php') ?>