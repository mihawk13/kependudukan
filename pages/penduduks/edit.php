<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Penduduk</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-show.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<form action="update.php" method="post" enctype="multipart/form-data">
  <h3>A. Data Pribadi</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">NIK</th>
      <td width="1%">:</td>
      <td><input type="text" class="form-control" name="nik" value="<?php echo $data[0]['nik'] ?>"></td>
    </tr>
    <tr>
      <th>Nama Penduduk</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="nama" value="<?php echo $data[0]['nama'] ?>"></td>
    </tr>
    <tr>
      <th>Tempat Lahir</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data[0]['tempat_lahir'] ?>"></td>
    </tr>
    <tr>
      <th>Tanggal Lahir</th>
      <td>:</td>
      <td>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <span class="fa fa-table"></span>
            </span>
            <input type="text" class="form-control datepicker input-md" name="tanggal_lahir" size="20" readonly="readonly" value="<?php echo $data[0]['tanggal_lahir'] ?>" />
          </div>
          <span class="help-block">
            <?php # echo form_error('tgl_kelahiran', '<p class="field_error">','</p>')
            ?>
          </span>
        </div>
        </div>
        <!-- <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?php echo $data[0]['tanggal_lahir'] ?>">-->

      </td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>:</td>
      <td>
        <?php
        if ($data[0]['jenis_kelamin'] == 'L') {
        ?>

          <div class="radio">
            <label class="radio"><input type="radio" name="jenis_kelamin" value="L" checked="checked"> Laki - laki</label>
          </div>
          <div class="radio">
            <label class="radio"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
          </div>
        <?php } else {
        ?>
          <div class="radio">
            <label class="radio"><input type="radio" name="jenis_kelamin" value="L"> Laki - laki</label>
          </div>
          <div class="radio">
            <label class="radio"><input type="radio" name="jenis_kelamin" value="P" checked="checked"> Perempuan</label>
          </div>
        <?php
        } ?>
        </div>
        </div>
      </td>
    </tr>
  </table>

  <h3>B. Data Alamat</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Alamat KTP</th>
      <td width="1%">:</td>
      <td><textarea class="form-control" name="alamat_ktp"><?php echo $data[0]['alamat_ktp'] ?></textarea></td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>:</td>
      <td><textarea class="form-control" name="alamat"><?php echo $data[0]['alamat'] ?></textarea></td>
    </tr>
    <tr>
      <th>RT</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="rt" required>
          <option value="<?php echo $data[0]['rt'] ?>" selected><?php echo $data[0]['rt'] ?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>RW</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="rw" required>
          <option value="<?php echo $data[0]['rw'] ?>" selected><?php echo $data[0]['rw'] ?></option>
          <option value="01">01</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Desa/Kelurahan</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="desa_kelurahan" value="<?php echo $data[0]['desa_kelurahan'] ?>"></td>
    </tr>
    <tr>
      <th>Kecamatan</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="kecamatan" value="<?php echo $data[0]['kecamatan'] ?>"></td>
    </tr>
    <tr>
      <th>Kabupaten/Kota</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="kabupaten_kota" value="<?php echo $data[0]['kabupaten_kota'] ?>"></td>
    </tr>
    <tr>
      <th>Provinsi</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="provinsi" value="<?php echo $data[0]['provinsi'] ?>"></td>
    </tr>
    <tr>
      <th>Negara</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="negara" value="<?php echo $data[0]['negara'] ?>"></td>
    </tr>

  </table>

  <h3>C. Data Lain-lain</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Agama</th>
      <td width="1%">:</td>
      <td>
        <select class="form-control selectlive" name="agama" required>
          <option value="<?php echo $data[0]['agama'] ?>" selected><?php echo $data[0]['agama'] ?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katholik">Katholik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Pendidikan Terakhir</th>
      <td>:</td>
      <td>
        <select class="form-control selectlive" name="pendidikan_terakhir" required>
          <option value="<?php echo $data[0]['pendidikan_terakhir'] ?>" selected><?php echo $data[0]['pendidikan_terakhir'] ?></option>
          <option value="Tidak Sekolah">Tidak Sekolah</option>
          <option value="Tidak Tamat SD">Tidak Tamat SD</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="D1">D1</option>
          <option value="D2">D2</option>
          <option value="D3">D3</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Pekerjaan</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="pekerjaan" value="<?php echo $data[0]['pekerjaan'] ?>"></td>
    </tr>
    <tr>
      <th>Status Perkawinan</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="status" required>
          <option value="<?php echo $data[0]['status'] ?>" selected><?php echo $data[0]['status_perkawinan'] ?></option>
          <option value="Kawin">Kawin</option>
          <option value="Belum Kawin">Belum Kawin</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Upload KTP <small>(biarkan kosong jika tidak diubah)</small></th>
      <td>:</td>
      <td><input type="file" class="form-control" name="ktp"></td>
    </tr>
  </table>

  <button type="submit" class="btn btn-success">
    <i class="fa fa-save"></i> Simpan
  </button>
  <button type="button" class="btn btn-danger" onclick="javascript:history.back()">
    <i class="fa fa-arrow-circle-left"></i> Batal
  </button>
  <input type="hidden" name="id_pdd" value="<?php echo $data[0]['id_pdd'] ?>">
</form>

<?php include('../_partials/bottom.php') ?>