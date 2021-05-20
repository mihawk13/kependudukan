<?php include('../_partials/top.php') ?>

<?php # include('list_keluarga.php') 
?>
<?php include('data-edit.php') ?>
<h1 class="page-header">Ubah Kelahiran</h1>
<?php include('_partials/menu.php') ?>
<form action="update.php" method="post">
  <input type="hidden" name="id_pdd" value="<?= $data_kelahiran[0]['id_pdd'] ?>" />
  <input type="hidden" name="id_kelahiran" value="<?= $data_kelahiran[0]['id_kelahiran'] ?>" />
  <label class="col-md-0 control-label" for="=">
    <h4>Data Bayi</h4>
  </label>
  <legend></legend>
  <div class="form-group">
    <label class="col-md-3 control-label" for="nama_bayi">Nama Bayi</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="nama_bayi" id="nama_bayi" size="30" placeholder="Nama Bayi" value="<?= $data_kelahiran[0]['nama_bayi'] ?>" required />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="id_jen_kel">Jenis Kelamin</label>
    <div class="col-md-9">
      <?php
      if ($data_kelahiran[0]['jk'] == 'L') {
      ?>

        <div class="radio">
          <label class="radio"><input type="radio" name="jk" value="L" checked="checked"> Laki - laki</label>
        </div>
        <div class="radio">
          <label class="radio"><input type="radio" name="jk" value="P"> Perempuan</label>
        </div>
      <?php } else {
      ?>
        <div class="radio">
          <label class="radio"><input type="radio" name="jk" value="L"> Laki - laki</label>
        </div>
        <div class="radio">
          <label class="radio"><input type="radio" name="jk" value="P" checked="checked"> Perempuan</label>
        </div>
      <?php
      } ?>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="tgl_kelahiran">Tanggal Kelahiran</label>
    <div class="col-md-9">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="fa fa-table"></span>
        </span>
        <input type="text" class="form-control datepicker input-md" name="tgl_kelahiran" size="20" readonly="readonly" value="<?= $data_kelahiran[0]['tgl_kelahiran'] ?>" />
      </div>
      <span class="help-block">
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="berat_bayi">Berat Bayi </label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="berat_bayi" id="berat_bayi" size="10" placeholder="Berat Bayi (kg)" value="<?= $data_kelahiran[0]['berat_bayi'] ?>" required />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="panjang_bayi">Panjang Bayi </label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="panjang_bayi" id="panjang_bayi" size="10" placeholder="Panjang Bayi (cm)" value="<?= $data_kelahiran[0]['panjang_bayi'] ?>" required />
      </span>
    </div>
  </div>

  <legend>&nbsp </legend>
  <div class="form-group">
    <label class="col-md-3 control-label" for="no_kk">No Kepala Keluarga</label>
    <div class="col-md-9">
      <span class="help-block">
        <input id="no_kk_sementara" name="no_kk_sementara" type="text" placeholder="No Kepala Keluarga" class="form-control input-md" required="" value="<?= $data_keluarga[0]['nomor_kk'] ?>" disabled />
        <input type="hidden" class="form-control input-md" name="no_kk" id="no_kk" size="50" value="<?= $data_keluarga[0]['nomor_kk'] ?>" />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nama_kk">Nama Kepala Keluarga</label>
    <div class="col-md-9">
      <span class="help-block">
        <input id="nama_kk_sementara" name="nama_kk_sementara" type="text" placeholder="Nama Kepala Keluarga" class="form-control input-md" required="" value="<?= $data_keluarga[0]['nama'] ?>" disabled />
        <input type="hidden" class="form-control input-md" name="nama_kk" id="nama_kk" size="50" value="<?= $data_keluarga[0]['nama'] ?>" />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nama_ayah">Nama Ayah</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" size="50" placeholder="Nama Ayah" value="<?= $data_kelahiran[0]['nama_ayah'] ?>" readonly/>
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nama_ibu">Nama Ibu</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" size="50" placeholder="Nama Ibu" value="<?= $data_kelahiran[0]['nama_ibu'] ?>" readonly />
      </span>
    </div>
  </div>


  <legend>&nbsp </legend>
  <label class="col-md-0 control-label" for="=">
    <h4>Data Kelahiran</h4>
  </label>
  <legend></legend>

  <div class="form-group">
    <label class="col-md-3 control-label" for="lokasi_lahir">Lokasi Lahir </label>
    <div class="col-md-9">
      <span class="help-block">
        <select class="form-control selectlive" name="lokasi_lahir" required>
          <option value="<?= $data_kelahiran[0]['lokasi_lahir'] ?>" selected><?= $data_kelahiran[0]['lokasi_lahir'] ?></option>
          <option value="Rumah Bersalin">Rumah Bersalin</option>
          <option value="Bukan Rumah Bersalin">Bukan Rumah Bersalin</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="tempat_lahir">Tempat Lahir</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="tempat_lahir" id="tempat_lahir" size="30" placeholder="Tempat Lahir" value="<?= $data_kelahiran[0]['tempat_lahir'] ?>" />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="penolong">Nama Penolong Kelahiran</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="penolong" id="penolong" size="30" placeholder="Nama Penolong Kelahiran" value="<?= $data_kelahiran[0]['penolong'] ?>" />
      </span>
    </div>
  </div>

  <legend>&nbsp </legend>

  <legend></legend>
  <button type="submit" class="btn btn-success">
    <i class="fa fa-save"></i> Simpan
  </button>
  <button type="reset" class="btn btn-warning">
    <i class="fa fa-repeat 
 "></i> Reset
  </button>
</form>



<?php include('../_partials/bottom.php') ?>
<script type="text/javascript">
  $("#isian").on("change", function() {
    var no_kk = $("#isian option:selected").attr("no_kk");
    var nm_kk = $("#isian option:selected").attr("nm_kk");
    //pindah isi ke tag lain
    $("#no_kk_sementara").val(no_kk);
    $("#no_kk").val(no_kk);
    $("#nama_kk_sementara").val(nm_kk);
    $("#nama_kk").val(nm_kk);
  });
</script>