<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Voting | E-Voting</title>
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
  <!-- Sweetalert 2 -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/sweetalert2.min.css"> -->

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
          Voting
          <small>voot</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>voting</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <?= $this->session->flashdata('message'); ?>
        <div class="box box-primary">
            <div class="box-header">
                <h6 class="box-title">Pilih Calon Sesuai Keinginan Anda</h6>
            </div>
            <div class="box-body">
                <div class="row">
                  <?php foreach($calon as $c) : ?>
                    <div class="col-sm-3 col-xs-6">
                        <div class="box box-primary">
                            <img src="<?= base_url('assets/dist/img/img-calon/').$c['foto_calon']; ?>" style="width:100%;" class="img-responsive" alt="foto calon">
                            <div class="box-body">
                                <h4 class="text-center" style="text-transform:uppercase;"><?= $c['nama_calon'] ?></h4>
                            </div>
                            <div class="box-footer text-center">
                              <div class="row">
                                <div class="col-xs-6">
                                  <button type="button" class="btn btn-md btn-primary btn-block btn-flat voting" onclick="tes(<?= $c['id']; ?>, <?= $user['NIS'] ?>)">Pilih</button>
                                </div>
                                <div class="col-xs-6">
                                  <button type="button" class="btn btn-md btn-success btn-block btn-flat details" data-id="<?= encrypt_url($c['id']) ?>" data-target="#dataDetail" data-toggle="modal">Detail</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                  <a href="<?= base_url('main') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"></i> Kembali</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('main/dashboard') ?>" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Go To Dashboard</a>
                </div>
            </div>
        </div>
        <div class="callout callout-info">
          <h4>Perhatian!</h4>
          <p>Pastikan Anda Memilih 1 Kandidat Saja. Jika Lebih Dari 1 System Akan Mencatan Data Diri Anda</p>
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

<!-- Modal -->
<div class="modal fade" id="dataDetail">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Detail Paslon</h4>
				</div>
				<div class="modal-body">
					<div class="box box-primary">
						<div class="box-body">
							<div class="row">
								<div class="col-sm-4">
									<img src="" id="foto3" class="img-responsive img-thumbnail" alt="Foto Paslon">
								</div>
								<div class="col-sm-8">
									<table class="table table-striped">
										<tr>
											<th style="width:120px;">Nama Paslon</th>
											<th style="width:10px;">:</th>
											<td><span id="nama3"></span></td>
										</tr>
										<tr>
											<th style="width:120px;">Visi</th>
											<th style="width:10px;">:</th>
											<td><p id="visi3"></p></td>
										</tr>
										<tr>
											<th style="width:120px;">Misi</th>
											<th style="width:10px;">:</th>
											<td><p id="misi3"></p></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

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
<!-- Sweetalert 2 -->
<script src="<?= base_url('assets/') ?>dist/js/sweetalert2.all.min.js"></script>
<script>
  $('.details').click(function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "<?= base_url('main/details') ?>",
      data: {
        'id' : id
      },
      success: function (response) {
        var json = JSON.parse(response);
        $('#foto3').attr('src', '<?= base_url('assets/dist/img/img-calon/') ?>' + json.foto);
        $('#nama3').text(json.nama);
        $('#visi3').text(json.visi);
        $('#misi3').text(json.misi);
      }
    });
  });
  function tes(id, NIS) {
    var id  = id;
    var NIS = NIS;
    Swal.fire({
      title: 'Apakah Kamu Yakin?',
      text: "Pilihanmu Menentukan Masa Yang Akan Datang!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Saya Yakin!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "GET",
          url: "<?= base_url('main/check') ?>",
          data: {
            'NIS' : NIS
          },
          success: function (response) {
            var json = JSON.parse(response);
            if (json.response == 'Sudah Memilih') {
              Swal.fire(
                'Error Forbidden',
                'Anda hanya bisa memilih 1 kali saja',
                'error'
              )
              $('.voting').attr('disabled', 'disabled');
            } else {
              $.ajax({
                type: "POST",
                url: "<?= base_url('main/end') ?>",
                data: {
                  'id'  : id,
                  'NIS' : NIS
                },
                beforeSend: function (result) {
                  $('.voting').attr('disabled', 'disabled');
                },
                success: function (response) {
                  Swal.fire(
                    'Sukses!',
                    'Terima Kasih. Pilihanmu Sudah Tersimpan!',
                    'success'
                  ).then((result) => {
                    window.location.href = '<?= base_url('main/dashboard') ?>';
                  })
                }
              });
            }
          }
        });
      }
    })
  }
</script>
</body>
</html>
