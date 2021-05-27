<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data User</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Keterangan</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $user) : ?>
    <tr>
      <td><?php echo $user['id'] ?></td>
      <td><?php echo $user['nama'] ?></td>
      <td><?php echo $user['username'] ?></td>
      <td><?php echo $user['keterangan'] ?></td>
      <td><?php echo $user['status'] ?></td>
      <td>
        <!-- Single button -->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <li>
              <a href="edit.php?id=<?php echo $user['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                <i class="glyphicon glyphicon-trash"></i> Hapus
              </a>
            </li>
          </ul>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php include('../_partials/bottom.php') ?>
