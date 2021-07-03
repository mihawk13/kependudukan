<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kartu Keluarga</h1>

<?php include('data-create.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<form action="store.php" method="post" enctype="multipart/form-data">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Nomor Kartu Keluarga</th>
    <td width="1%">:</td>
    <td><input type="number" class="form-control" name="nomor_kk" required></td>
  </tr>
  <tr>
    <th>ID Kepala Keluarga</th>
    <td>:</td>
    <td>
      <select class="form-control selectlive" name="id_kepala_keluarga" required>
        <option value="" selected disabled>- pilih -</option>
        <?php foreach ($data as $pdd) : ?>
        <option value="<?php echo $pdd['id_pdd'] ?>">
          <?php echo $pdd['nama'] ?> (NIK: <?php echo $pdd['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>
    </td>
  </tr>
  <tr>
    <th>Upload Photo KK</th>
    <td>:</td>
    <td><input type="file" class="form-control" name="kk" required></td>
  </tr>
</table>

<button type="submit" class="btn btn-success">
  <i class="fa fa-save"></i> Simpan
</button>
<button type="button" class="btn btn-danger" onclick="javascript:history.back();">
  <i class="fa fa-arrow-circle-left"></i> Batal
</button>
</form>

<?php include('../_partials/bottom.php') ?>
