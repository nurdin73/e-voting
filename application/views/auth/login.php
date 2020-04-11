<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | E-Voting</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>"><b>E-Voting</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Masuk Untuk Melanjukan!</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Nama Lengkap">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="pass" class="form-control" placeholder="NIS">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('pass', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <div class="container">
        <div class="box box-danger">
            <div class="box-header">
                <h6 class="box-title text-grey" style="font-weight:bold;">Tata Cara Menggunakan E-voting</h6>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    <li>Masuk Menggunakan Data Diri Anda</li>
                    <li>Check Data Diri Anda Apakah Sudah Sesuai Atau Tidak</li>
                    <li>Jika Sesuai. Maka Lanjutkan</li>
                    <li>Pilih Calon yang Anda Sukai Dengan Cara Klik Salah Satu Foto Calon</li>
                    <li>Pastikan Anda Hanya Memiliih Satu Saja. Jika Pilihan Anda Lebih Dari 1 Maka System Akan Mencatat Perilaku Anda</li>
                    <li>Jika Sudah. Anda Akan Diredirect Ke Halaman Statistik Hasil Voting</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
    <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>
</html>
