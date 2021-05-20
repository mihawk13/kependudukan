<?php include('../_partials/top.php') ?>
<!--
<h1 class="page-header">Dasbor</h1>
-->
<?php include('data-index.php') ?>
<!-- dashbord template -->
<div class="row">
  <div class="panel well">
    <div class="row">
      <div class="col-md-12">
        <h2>
          <center><strong>
              <font color="blue">Hai <?php echo $_SESSION['user']['nama_user']; ?></font>
            </strong></center>
        </h2><span></span>
        <div class="col-xs-12">
          <font color="grey">
            <h4>
              <center>Selamat datang di Aplikasi Kependudukan Kelurahan Wae Belang</center>
            </h4>
          </font>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-user fa-group fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Penduduk</h3><br>
            </div>
            <div>
              <p align="right">Total ada <?php echo $jumlah['total'] ?> data penduduk. <?php echo $jumlah_l['total'] ?> di antaranya laki-laki, dan <?php echo $jumlah_p['total'] ?> diantaranya perempuan. <br />Penduduk di atas 17 tahun berjumlah <?php echo $jumlah_ld_17['total'] ?> orang, dan di bawah 17 tahun berjumlah <?php echo $jumlah_kd_17['total'] ?> orang.
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php if ($_SESSION['user']['status_user'] != 'Lurah') : ?>
        <a href="../penduduks">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3 text-right">
            <i class="fa fa-user fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Kartu Keluarga</h3>
            </div>
            <div>
              <p>Total ada <?php echo $jumlah_kartu_keluarga['total'] ?> data kartu keluarga</p>
            </div>
          </div>
        </div>
      </div>
      <?php if ($_SESSION['user']['status_user'] != 'Lurah') : ?>
        <a href="../kartu-keluarga">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-exchange fa-fw fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Mutasi</h3>
            </div>
            <div>
              <p>
                Total ada <?php echo $jumlah_mutasi_masuk['total'] ?> data mutasi masuk.
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php if ($_SESSION['user']['status_user'] != 'Lurah') : ?>
        <a href="../mutasi-datang">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>



</div>
<?php include('../_partials/bottom.php') ?>