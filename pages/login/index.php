<?php
session_start();

// jika sudah login, alihkan ke halaman dasbor
if (isset($_SESSION['user'])) {
  header('Location: ../dasbor/index.php');
  exit();
}
?>

<?php include('../_partials/top-login.php') ?>

<body style="background-image:url(../../assets/img/blue.jpg);background-size:cover;">

  <div class="row" style="margin-top: 100px;">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-heading">
              <center>Aplikasi Kependudukan</center>
            </h3>
          </div>
        </div>


        <div class="panel-heading">
          <h3 class="panel-title">Silahkan login terlebih dahulu !</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="../login/proses-login.php">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Nama Pengguna" name="username" type="text" required autofocus>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Kata Sandi" name="password" type="password" required>
              </div>
              <button type="submit" class="btn btn-lg btn-primary btn-block">Masuk </button>
              <hr>
              <center>
                Distributed by <a href="/" target="_blank" rel="noopener noreferrer">Meisyntia Angelina</a>
              </center>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<?php include('../_partials/bottom-login.php') ?>