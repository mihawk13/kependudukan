<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kartu Keluarga</h1>

<?php include('data-show.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<form action="update.php" method="post" enctype="multipart/form-data">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Nomor Kartu Keluarga</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="nomor_kk" value="<?php echo $data_keluarga[0]['nomor_kk'] ?>"></td>
    <td><input type="hidden" name="id_kk" value="<?php echo $data_keluarga[0]['id_keluarga'] ?>"></td>
  </tr>
  <tr>
    <th>Kepala Keluarga</th>
    <td>:</td>
    <td>
      <select class="form-control selectlive" name="id_kepala_keluarga" required>
        <option value="<?php echo $data_keluarga[0]['id_pdd'] ?>" selected><?php echo $data_keluarga[0]['nama'] ?></option>
        <?php foreach ($data as $pdd) : ?>
        <option value="<?php echo $pdd['id_pdd'] ?>">
          <?php echo $pdd['nama'] ?> (NIK: <?php echo $pdd['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>
    </td>
  </tr>
    <tr>
      <th>Upload Photo KK <small>(biarkan kosong jika tidak diubah)</small></th>
      <td>:</td>
      <td><input type="file" class="form-control" name="kk"></td>
    </tr>
</table>

<button type="submit" class="btn btn-success">
  <i class="fa fa-save"></i> Simpan
</button>

<button type="button" class="btn btn-danger" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Batal
</button>
<input type="hidden" name="id_keluarga" value="<?php echo $data_keluarga[0]['id_keluarga'] ?>">
</form>

<?php include('../_partials/bottom.php') ?>
