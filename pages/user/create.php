<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data User</h1>
<button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</button>
<form action="store.php" method="post">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Nama User</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="nama" required></td>
  </tr>
  <tr>
    <th>Username</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="username" required></td>
  </tr>
  <tr>
    <th>Password</th>
    <td>:</td>
    <td><input type="password" class="form-control" name="password" required></td>
  </tr>
  <tr>
    <th>Keterangan</th>
    <td>:</td>
    <td><textarea class="form-control" name="keterangan"></textarea></td>
  </tr>
  <tr>
    <th>Status</th>
    <td>:</td>
    <td>
      <select class="form-control selectpicker" name="status" required>
        <option value="" selected disabled>- pilih -</option>
        <option value="Admin">Admin</option>
        <option value="Lurah">Lurah</option>
      </select>
    </td>
  </tr>
</table>

<button type="submit" class="btn btn-success btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>

<?php include('../_partials/bottom.php') ?>
