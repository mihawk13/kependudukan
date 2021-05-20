<?php include('../_partials/top.php') ?>

<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>
<h1 class="page-header" align="center">Detail Mutasi Keluar</h1>

<?php include('data-show.php') ?>

<h3>A. Data Pribadi</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">NIK</th>
    <td width="1%">:</td>
    <td><?php echo $data[0]['nik'] ?></td>
  </tr>
  <tr>
    <th>Nama</th>
    <td>:</td>
    <td><?php echo $data[0]['nama'] ?></td>
  </tr>
  <tr>
    <th>Tempat Lahir</th>
    <td>:</td>
    <td><?php echo $data[0]['tempat_lahir'] ?></td>
  </tr>
  <tr>
    <th>Tanggal Lahir</th>
    <td>:</td>
    <td><?php echo $data[0]['tanggal_lahir'] ?></td>
  </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <td>:</td>
    <td><?php echo $data[0]['jenis_kelamin'] ?></td>
  </tr>
  <tr>
    <th>Agama</th>
    <td>:</td>
    <td><?php echo $data[0]['agama'] ?></td>
  </tr>
  <tr>
    <th>Pendidikan</th>
    <td>:</td>
    <td><?php echo $data[0]['pendidikan_terakhir'] ?></td>
  </tr>
  <tr>
    <th>Pekerjaan</th>
    <td>:</td>
    <td><?php echo $data[0]['pekerjaan'] ?></td>
  </tr>

  <tr>
    <th>Status Tinggal</th>
    <td>:</td>
    <td><?php echo $data[0]['status'] ?></td>
  </tr>
</table>

<h3>B. Data Alamat Mutasi Keluar</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Alamat</th>
    <td width="1%">:</td>
    <td><?php echo $data_mutasi[0]['alamat_mutasi'] ?></td>
  </tr>
  <tr>
    <th>Desa/Kelurahan</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['desa_kelurahan_mutasi'] ?></td>
  </tr>
  <tr>
    <th>Kecamatan</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['kecamatan_mutasi'] ?></td>
  </tr>
  <tr>
    <th>Kabupaten/Kota</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['kabupaten_kota_mutasi'] ?></td>
  </tr>
  <tr>
    <th>Provinsi</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['provinsi_mutasi'] ?></td>
  </tr>
  <tr>
    <th>Negara</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['negara_mutasi'] ?></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['rt_mutasi'] ?></td>
  </tr>

  <tr>
    <th>RW</th>
    <td>:</td>
    <td><?php echo $data_mutasi[0]['rw_mutasi'] ?></td>
  </tr>
</table>

<h3>C. Data Alamat Asal</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Desa / Keluarahan</th>
    <td width="1%">:</td>
    <td><?php echo $data[0]['desa_kelurahan'] ?></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td><?php echo $data[0]['rt'] ?></td>
  </tr>

  <tr>
    <th>RW</th>
    <td>:</td>
    <td><?php echo $data[0]['rw'] ?></td>
  </tr>

</table>

<?php include('../_partials/bottom.php') ?>