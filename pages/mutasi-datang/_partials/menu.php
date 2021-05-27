<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <?php if ($_SESSION['user']['status'] != 'Lurah') : ?>
        <div class="col-md-2">
          <a href="pindah_masuk.php" class="btn btn-success">
            <i class="fa fa-plus-square"></i> Tambah
          </a>
        </div>
      <?php endif; ?>
      <?php if ($_SESSION['user']['status'] == 'Lurah') : ?>
        <div class="col-md-2">
          <a href="cetak-index.php" target="_blank" class="btn btn-outline btn-primary">
            <i class="glyphicon glyphicon-print"></i> Cetak
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<br>