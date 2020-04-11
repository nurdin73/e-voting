<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit | E-Voting</title>
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
          <a href="<?= base_url('main')?>" class="navbar-brand"><b>E-Voting</b></a>
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
          Edit Data
          <small>Checking Data</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Edit</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h6 class="box-title">Data Diri Atas Nama : <b><?= $user['nama_lengkap']; ?></b></h6>
            </div>
            <div class="box-body">
              <form action="<?= base_url('main/edit/').$this->uri->segment(3) ?>" method="post">
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" name="NIS" value="<?= $user['NIS'] ?>" placeholder="NIS">
                        <?= form_error('NIS', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" name="nama" value="<?= $user['nama_lengkap'] ?>" placeholder="Nama Lengkap">
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10" style="margin-bottom:15px;">
                        <input type="text" class="form-control" name="kelas" value="<?= $user['kelas'] ?>" placeholder="Kelas">
                        <?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                  <a href="<?= base_url('main') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"></i> Cancel</a>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Update</button>
                </div>
              </form>
            </div>
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
