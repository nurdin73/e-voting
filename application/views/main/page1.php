<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | E-Voting</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url('main') ?>" class="navbar-brand"><b>E-Voting</b></a>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Validation
          <small>Check Data Diri</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <?= $this->session->flashdata('message'); ?>
        <div class="box box-primary">
            <div class="box-header">
                <h6 class="box-title">Data Diri Atas Nama : <b><?= $user['nama_lengkap']; ?></b></h6>
                <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-flat btn-danger pull-right">Logout</a>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" value="<?= $user['NIS'] ?>" placeholder="Email" disabled>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" value="<?= $user['nama_lengkap'] ?>" placeholder="Email" disabled>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" name="kelas" value="<?= $user['kelas'] ?>" placeholder="Kelas" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <?php
                        if ($user['status'] == 1) {
                          echo '<span class="btn btn-sm btn-success btn-flat">Sudah Memilih</span>';
                        } else {
                          echo '<span class="btn btn-sm btn-danger btn-flat">Belum Memilih</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?php if($user['status'] == 1) :?>
                  <div class="alert alert-success">Terima Kasih Sudah Mengikuti E-Voting Ini. Silahkan Lihat Hasil QuickCount Sementara</div>
                  <a href="<?= base_url('main/dashboard') ?>" class="btn btn-sm btn-flat btn-primary pull-left">Go To Dashboard</a>
                <?php else : ?>
                  <div class="pull-left">
                    <a href="<?= base_url('main/edit/').$user['id'] ?>" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('main/voting') ?>" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Lanjutkan</a>
                  </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="callout callout-info">
          <h4>Perhatian!</h4>
          <p>Pastikan Data Yang Sudah Tertampil Benar. Jika Tidak Silahkan Klik Tombol Edit. Dan Pastikan Yang Anda Masukkan Sudah Benar. Karena Data Ini Akan Dicocokan Dengan Data Siswa. Jika Tidak Cocok Maka akan Dinyatakan Nama Anda Tidak Terdaftar!.</p>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        Page rendered in <strong>{elapsed_time}</strong> seconds.
      </div>
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('main') ?>">E-Voting</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
</body>
</html>
