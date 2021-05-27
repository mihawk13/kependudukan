<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kematian</h1>
<?php include('_partials/menu.php') ?>
<?php include('list_keluarga.php') ?>
<?php include('data-show.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<form action="update.php" method="post">
  <input type="hidden" name="id_meninggal" value="<?= $datakmt[0]['id_meninggal'] ?>"/>
  <label class="col-md-0 control-label" for="#">
    <h4>Ubah Data Kematian Penduduk</h4>
  </label>
  <legend></legend>

  <div class="form-group">
    <label class="col-md-3 control-label" for="no_nama_kk">Pencarian Data Penduduk</label>
    <div class="col-md-9">
      <span class="help-block">
        <select class="form-control selectlive" id="isian">
          <option value="" selected disabled>- cari -</option>
          <?php foreach ($data as $pdd) : ?>
            <option value="<?php echo $pdd['nik'] ?>" nik="<?php echo $pdd['nik'] ?>" id_pdd="<?php echo $pdd['id_pdd'] ?>" nama="<?php echo $pdd['nama'] ?>">
              <?php echo $pdd['nama'] ?> (NIK : <?php echo $pdd['nik'] ?>)
            </option>
          <?php endforeach ?>
        </select>

      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nama">Nama Penduduk</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="nama" id="nama" size="50" value="<?= $datakmt[0]['nama'] ?>" readonly />
      </span>
    </div>

  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nik">NIK</label>
    <div class="col-md-9">
      <span class="help-block">
        <input id="nik_sementara" name="nik_sementara" type="text" placeholder="NIK" class="form-control input-md" value="<?= $datakmt[0]['nik'] ?>" readonly />
        <input type="hidden" name="id_pdd" id="id_pdd" value="<?= $datakmt[0]['id_pdd'] ?>" />
        <input type="hidden" class="form-control input-md" name="NIK" id="nik" size="50" />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="tgl_kematian">Tanggal Kematian</label>
    <div class="col-md-9">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="fa fa-table"></span>
        </span>
        <input type="text" class="form-control datepicker input-md" name="tgl_kematian" size="20" value="<?= $datakmt[0]['tgl_meninggal'] ?>" readonly="readonly" />
      </div>
      <span class="help-block">
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="penyebab_kematian">Penyebab Kematian</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control" name="penyebab_kematian" id="penyebab_kematian" size="50" placeholder="Penyebab Kematian" value="<?= $datakmt[0]['sebab'] ?>" />
      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="tempat_kematian">Tempat Kematian</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control" name="tempat_kematian" id="tempat_kematian" size="50" placeholder="Tempat Kematian" value="<?= $datakmt[0]['tempat_kematian'] ?>" />
      </span>
    </div>
  </div>

  <legend>&nbsp </legend>
  <label class="col-md-0 control-label" for="=">
    <h4>Data Pelapor Kematian</h4>
  </label>
  <legend></legend>

  <div class="form-group">
    <label class="col-md-3 control-label" for="pelapor">Nama Pelapor Kematian</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="pelapor" id="pelapor" size="30" placeholder="Nama Pelapor Kematian" value="<?= $datakmt[0]['nama_pelapor'] ?>" />

      </span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="hub_pelapor">Hubungan Pelapor</label>
    <div class="col-md-9">
      <span class="help-block">
        <input type="text" class="form-control input-md" name="hub_pelapor" id="hub_pelapor" size="30" placeholder="Hubungan Pelapor" value="<?= $datakmt[0]['hubungan_pelapor'] ?>" />
      </span>
    </div>
  </div>


  <legend>&nbsp </legend>
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
    var id_pdd = $("#isian option:selected").attr("id_pdd");
    var nik = $("#isian option:selected").attr("nik");
    var nama = $("#isian option:selected").attr("nama");
    //window.alert ("hehe");
    //pindah isi ke tag lain
    $("#id_pdd").val(id_pdd);
    $("#nik_sementara").val(nik);
    $("#nik").val(nik);
    $("#nama_sementara").val(nama);
    $("#nama").val(nama);
  });
</script>