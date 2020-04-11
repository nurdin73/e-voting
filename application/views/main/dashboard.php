<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | E-Voting</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- chart js -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/chart.min.css">
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
    <?php date_default_timezone_set('Asia/jakarta'); ?>
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
          Dashboard
          <small>Quick Count Data</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <?= $this->session->flashdata('message'); ?>
        <div class="box box-primary">
            <div class="box-header">
                <h6 class="box-title">Quick Count Sementara Pukul : <span class="label label-primary" id="waktu">
                  <span id="date"></span>
                  <span id="month"></span>
                  <span id="year"></span>
                  <span id="jam"></span>:
                  <span id="menit"></span>:
                  <span id="detik"></span>
                </span> </h6>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div class="box box-primary" id="grafik">
                            <div class="box-body">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="alert alert-info" style="overflow:hidden; margin-bottom:10px;">
                                    <span class="pull-left">Jumlah Siswa</span>
                                    <span class="label label-success pull-right"><?= $siswa; ?></span>
                                </div>
                                <div class="alert alert-success" style="overflow:hidden; margin-bottom:10px;">
                                    <span class="pull-left">Jumlah Siswa Yang Sudah Memilih</span>
                                    <span class="label label-danger pull-right"><?= $voting; ?></span>
                                </div>
                                <div class="alert alert-danger" style="overflow:hidden; margin-bottom:10px;">
                                    <span class="pull-left">Jumlah Siswa Yang Belum Memilih</span>
                                    <span class="label label-info pull-right"><?= $siswa - $voting ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<!-- chart js -->
<script src="<?= base_url('assets/') ?>dist/js/chart.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<script>
    var ctx = document.getElementById('pieChart');
    function diagram() {
        var data_nama = [];
        var jumlah = []; 
        $.post("<?= base_url('main/dataChart') ?>",
        function (data) {
            var json = JSON.parse(data);
            $.each(json.hasil, function (i, data) { 
                data_nama.push(data.nama);
                jumlah.push(data.jumlah);
            });
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data_nama,
                    datasets: [{
                        label: '# Jumlah Voting',
                        data: jumlah,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    animation : false,
                    hover : {
                        mode : 'index'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                stepSize : 1,
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        })
    }
    window.setInterval("diagram()", 1000);
    window.setInterval("waktu()", 1);
    function waktu() {
            var waktu = new Date();
            // setTimeout("waktu()", 1000);

            // Jam
            if (waktu.getHours() < 10) {
                document.getElementById("jam").innerHTML = "0"+ waktu.getHours();
            } else {
                document.getElementById("jam").innerHTML = waktu.getHours();
            }
            if(waktu.getMinutes() < 10) {
                document.getElementById("menit").innerHTML = "0"+ waktu.getMinutes();
            } else {
                document.getElementById("menit").innerHTML = waktu.getMinutes();
            }
            if (waktu.getSeconds() < 10) {
                document.getElementById("detik").innerHTML = "0" + waktu.getSeconds();
            } else {
                document.getElementById("detik").innerHTML = waktu.getSeconds();
            }
            

            if (waktu.getDate() < 10) {
                document.getElementById("date").innerHTML = "0" + waktu.getDate();
            } else {
                document.getElementById("date").innerHTML = waktu.getDate();
            }
            document.getElementById("year").innerHTML = waktu.getFullYear();
            if (waktu.getMonth() == 0) {
                document.getElementById("month").innerHTML = "Januari";
            } else if(waktu.getMonth() == 1) {
                document.getElementById("month").innerHTML = "Februari";
            } else if(waktu.getMonth() == 2) {
                document.getElementById("month").innerHTML = "Maret";
            } else if(waktu.getMonth() == 3) {
                document.getElementById("month").innerHTML = "April";
            } else if(waktu.getMonth() == 4) {
                document.getElementById("month").innerHTML = "Mei";
            } else if(waktu.getMonth() == 5) {
                document.getElementById("month").innerHTML = "Juni";
            } else if(waktu.getMonth() == 6) {
                document.getElementById("month").innerHTML = "juli";
            } else if(waktu.getMonth() == 7) {
                document.getElementById("month").innerHTML = "Agustus";
            } else if(waktu.getMonth() == 8) {
                document.getElementById("month").innerHTML = "September";
            } else if(waktu.getMonth() == 9) {
                document.getElementById("month").innerHTML = "Oktober";
            } else if(waktu.getMonth() == 10) {
                document.getElementById("month").innerHTML = "November";
            } else if(waktu.getMonth() == 11) {
                document.getElementById("month").innerHTML = "Desember";
            }
        }


</script>
</body>
</html>
