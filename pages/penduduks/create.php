<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Penduduk</h1>
<?php include('_partials/menu.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>
<form action="store.php" method="post">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">NIK</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="nik" required></td>
  </tr>
  <tr>
    <th>Nama Penduduk</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="nama" required></td>
  </tr>
  <tr>
    <th>Tempat Lahir</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="tempat_lahir" required></td>
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
      <input type="text" class="form-control datepicker input-md" name="tanggal_lahir" size="20" readonly="readonly" />
    </div>
    <span class="help-block"> 
    </span>
    </div>
    </div>
 </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <td>:</td>
    <td>
      <div class="radio">
        <label class="radio"><input type="radio" name="jenis_kelamin" value="L"> Laki - laki</label>
      </div>
      <div class="radio">
        <label class="radio"><input type="radio" name="jenis_kelamin" value="L"> Perempuan</label>
  </div>
  </td>
  </tr>
</table>
<h3>B. Data Alamat</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Alamat KTP</th>
    <td width="1%">:</td>
    <td><textarea class="form-control" name="alamat_ktp" required></textarea></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><textarea class="form-control" name="alamat" required></textarea></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td>
      <select class="form-control selectpicker" name="rt" required>
        <option value="" selected disabled>- pilih -</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
      </select>
  </tr>
  <tr>
    <th>RW</th>
    <td>:</td>
    <td>
      <select class="form-control selectpicker" name="rw" required>
        <option value="" selected disabled>- pilih -</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
      </select>
  </tr>
  <tr>
    <th>Desa/Kelurahan</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="desa_kelurahan"></td>
  </tr>
  <tr>
    <th>Kecamatan</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="kecamatan"></td>
  </tr>
  <tr>
    <th>Kabupaten/Kota</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="kabupaten_kota""></td>
  </tr>
  <tr>
    <th>Provinsi</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="provinsi"></td>
  </tr>
  <tr>
    <th>Negara</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="negara"></td>
  </tr>
</table>

<h3>C. Data Lain-lain</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Agama</th>
    <td width="1%">:</td>
    <td>
      <select class="form-control selectlive" name="agama" required>
        <option value="" selected disabled>- pilih -</option>
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
        <option value="" selected disabled>- pilih -</option>
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
    <td><input type="text" class="form-control" name="pekerjaan"></td>
  </tr>
  <tr>
    <th>Status Perkawinan</th>
    <td>:</td>
    <td>
      <select class="form-control selectpicker" name="status" required>
        <option value="" selected disabled>- pilih -</option>
        <option value="Kawin">Kawin</option>
        <option value="Belum Kawin">Belum Kawin</option>
      </select>
    </td>
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
