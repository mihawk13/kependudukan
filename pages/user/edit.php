<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data User</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-show.php') ?>

<form action="update.php" method="post">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Nama</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="nama" value="<?php echo $data[0]['nama'] ?>" required></td>
  </tr>
  <tr>
    <th>Username</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="username" value="<?php echo $data[0]['username'] ?>" required></td>
  </tr>
  <tr>
    <th>Password</th>
    <td>:</td>
    <td>
      <input type="password" class="form-control" name="password">
      <small>Jika dikosongkan, maka password tidak berubah</small>
    </td>
  </tr>
  <tr>
    <th>Keterangan</th>
    <td>:</td>
    <td><textarea class="form-control" name="keterangan"><?php echo $data[0]['keterangan'] ?></textarea></td>
  </tr>
  <tr>
    <th>Status</th>
    <td>:</td>
    <td>
      <select class="form-control selectpicker" name="status" required>
        <option value="<?php echo $data[0]['status'] ?>" selected><?php echo $data[0]['status'] ?></option>
        <option value="Admin">Admin</option>
        <option value="Lurah">Lurah</option>
      </select>
    </td>
  </tr>
</table>

<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>

<?php include('../_partials/bottom.php') ?>
