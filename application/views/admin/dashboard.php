

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $apk['nama_apk']; ?>
        <small><?= $title; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <?= $title; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

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
                    <div class="col-md-8">
                        <div class="box box-primary" id="grafik">
                            <div class="box-body">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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

        <!-- tentang apk -->
        <div class="callout callout-danger">
          <h4><?= $apk['nama_apk'] ?></h4>
          <p><?= $apk['tentang'] ?></p>
        </div>
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    var ctx = document.getElementById('pieChart');
    function diagram() {
        var data_nama = [];
        var jumlah = []; 
        $.post("<?= base_url('admin/dataChart') ?>",
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
  