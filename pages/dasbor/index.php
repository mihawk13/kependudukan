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
              <font color="blue">Hai <?= $_SESSION['user']['nama']; ?></font>
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
            <i class="fa fa-user fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Penduduk</h3>
            </div>
            <div>
              <p>Total ada <?= $jumlah['total'] ?> data penduduk</p>
            </div>
          </div>
        </div>
      </div>
        <a href="../penduduks">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-2">
            <i class="fa fa-group fa-4x"></i>
          </div>
          <div class="col-xs-10 text-right">
            <div>
              <h3>Data Kartu Keluarga</h3>
            </div>
            <div>
              <p>Total ada <?= $jumlah_kartu_keluarga['total'] ?> data kartu keluarga</p>
            </div>
          </div>
        </div>
      </div>
        <a href="../kartu-keluarga">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-ambulance fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Kematian</h3>
            </div>
            <div>
              <p>
                Total ada <?= $jumlah_kematian['total'] ?> data kematian
              </p>
            </div>
          </div>
        </div>
      </div>
        <a href="../meninggal">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-venus-mars fa-4x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div>
              <h3>Data Kelahiran</h3>
            </div>
            <div>
              <p>Total ada <?= $jumlah_kelahiran['total'] ?> data kelahiran</p>
            </div>
          </div>
        </div>
      </div>
        <a href="../kelahiran">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-2">
            <i class="fa fa-long-arrow-right fa-4x"></i>
          </div>
          <div class="col-xs-10 text-right">
            <div>
              <h3>Data Penduduk Masuk</h3>
            </div>
            <div>
              <p>Total ada <?= $jumlah_mutasi_masuk['total'] ?> data penduduk masuk</p>
            </div>
          </div>
        </div>
      </div>
        <a href="../mutasi-datang">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-2">
            <i class="fa fa-long-arrow-left fa-4x"></i>
          </div>
          <div class="col-xs-10 text-right">
            <div>
              <h3>Data Penduduk Keluar</h3>
            </div>
            <div>
              <p>Total ada <?= $jumlah_mutasi_keluar['total'] ?> data penduduk keluar</p>
            </div>
          </div>
        </div>
      </div>
        <a href="../mutasi-keluar">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
    </div>
  </div>
</div>


</div>
<?php include('../_partials/bottom.php') ?>