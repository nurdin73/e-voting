

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
  