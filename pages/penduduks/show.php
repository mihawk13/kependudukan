<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Penduduk</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-show.php') ?>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>

<h3>A. Data KK</h3>
<?php
if($data_kk[]=!NULL){
 ?> 
<table class="table table-striped">
  <tr>
    <th width="20%">No KK</th>
    <td width="1%">:</td>
    <td><?php echo $data_kk[0]['nomor_kk'] ?></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><?php echo $data_kk[0]['alamat_keluarga'] ?></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td>
      <?php echo ($data_kk[0]['rt_keluarga'] )?>
    </td>
  </tr>
  <tr>
    <th>RW</th>
    <td>:</td>
    <td><?php echo $data_kk[0]['rw_keluarga'] ?></td>
  </tr>
</table>
<?php } ?>
<h3>B. Data Pribadi</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">NIK</th>
    <td width="1%">:</td>
    <td><?php echo $data[0]['nik'] ?></td>
  </tr>
  <tr>
    <th>Nama Penduduk</th>
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
    <td>
      <?php echo ($data[0]['tanggal_lahir'] != '0000-00-00') ? date('d-m-Y', strtotime($data[0]['tanggal_lahir'])) : ''?>
    </td>
  </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <td>:</td>
    <td><?php echo $data[0]['jenis_kelamin'] ?></td>
  </tr>
</table>

<h3>C. Data Alamat</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Alamat KTP</th>
    <td width="1%">:</td>
    <td><?php echo $data[0]['alamat_ktp'] ?></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><?php echo $data[0]['alamat'] ?></td>
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
  <tr>
    <th>Desa/Kelurahan</th>
    <td>:</td>
    <td><?php echo $data[0]['desa_kelurahan'] ?></td>
  </tr>
  <tr>
    <th>Kecamatan</th>
    <td>:</td>
    <td><?php echo $data[0]['kecamatan'] ?></td>
  </tr>
  <tr>
    <th>Kabupaten/Kota</th>
    <td>:</td>
    <td><?php echo $data[0]['kabupaten_kota'] ?></td>
  </tr>
  <tr>
    <th>Provinsi</th>
    <td>:</td>
    <td><?php echo $data[0]['provinsi'] ?></td>
  </tr>
  <tr>
    <th>Negara</th>
    <td>:</td>
    <td><?php echo $data[0]['negara'] ?></td>
  </tr>

</table>

<h3>D. Data Lain-lain</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Agama</th>
    <td width="1%">:</td>
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
    <th>Status</th>
    <td>:</td>
    <td><?php echo $data[0]['status_kependudukan'] ?></td>
  </tr>
</table>

<?php include('../_partials/bottom.php') ?>
