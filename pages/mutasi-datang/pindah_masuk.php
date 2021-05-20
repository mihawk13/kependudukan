<?php include('../_partials/top.php');
include('../../config/koneksi.php'); ?>

<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<h1 class="page-header" align="center">Pindah Masuk</h1>

<form action="store_datang.php" method="post">
  <h3>Data Pribadi</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Nomor Kartu Keluarga</th>
      <td width="1%">:</td>
      <td>
        <input type="text" placeholder="NO KK" class="form-control" name="nomor_kk" required>
    </tr>
    <tr>
      <th>Nomor Induk Penduduk</th>
      <td>:</td>
      <td>
        <input type="number" placeholder="Nomor Induk Penduduk" class="form-control" name="nik" required>
      </td>
      </td>
    </tr>
    <tr>
      <th>Nama Kepala Keluarga</th>
      <td>:</td>
      <td>
        <input type="text" placeholder="Nama Kepala Keluarga" class="form-control" name="nama_kepala_keluarga" required>
      </td>
      </td>
    </tr>
    <tr>
      <th>Tempat Lahir</th>
      <td>:</td>
      <td><input type="text" placeholder="Tempat Lahir" class="form-control" name="tempat_lahir" required></td>
    </tr>
    <tr>
      <th>Tanggal Lahir</th>
      <td>:</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">
            <span class="fa fa-table"></span>
          </span>
          <input type="text" class="form-control datepicker input-md" name="tanggal_lahir" size="20" readonly="readonly" />
        </div>
        <!-- <input type="text" class="form-control datepicker" name="tanggal_lahir" required> -->
      </td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>:</td>
      <td>
        <div class="form-group">
          <div class="col-md-9">
            <div class="radio">
              <label class="radio"><input type="radio" name="jk" value="L"> Laki - laki</label>
            </div>
            <div class="radio">
              <label class="radio"><input type="radio" name="jk" value="L"> Perempuan</label>
            </div>
          </div>
      </td>
    </tr>
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
  </table>

  <h3>Data Daerah Tujuan</h3>
  <table class="table table-striped table-middle">
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
        </select>
    </tr>
  </table>

  <h3>Data Kepindahan</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Alamat Asal</th>
      <td width="1%">:</td>
      <td><textarea placeholder="Alamat Asal" class="form-control" name="alamat_asal"></textarea></td>
    </tr>
    <tr>
      <th>Tanggal Pindah</th>
      <td>:</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">
            <span class="fa fa-table"></span>
          </span>
          <input type="text" class="form-control datepicker input-md" name="tanggal_pindah" size="20" readonly="readonly" />
        </div>
      </td>
    </tr>
    <tr>
      <th>Alasan Pindah</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="alasan_pindah" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Pekerjaan">Pekerjaan</option>
          <option value="Pendidikan">Pendidikan</option>
          <option value="Keamanan">Keamanan</option>
          <option value="Kesehatan">Kesehatan</option>
          <option value="Perumahan">Perumahan</option>
          <option value="Keluarga">Keluarga</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Jenis Kepindahan</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="jenis_kepindahan" required>
          <option value="Anggota Keluarga" default>Anggota Keluarga</option>

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