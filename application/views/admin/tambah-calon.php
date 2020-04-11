

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $subtitle; ?>
        <small><?= $title; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="<?= base_url('admin/calon') ?>"><i class="fa fa-archive"></i> Data Calon</a></li>
        <li class="active"><a href="#"><i class="fa fa-plus"></i> <?= $title; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
					<div class="box-header">
						<div class="progress active">
							<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" id="percent" aria-valuemax="100">
								<span id="status"></span>
							</div>
						</div>
					</div>
					<div class="box-body">
						<form method="post" id="formData">
							<div class="row">
								<div class="col-xs-8">
									<div class="box box-success">
										<div class="box-body">
											<div class="form-group">
												<label for="nama_paslon">Nama Paslon</label>
												<input type="text" name="nama_paslon" id="nama_paslon" class="form-control" placeholder="Nama Paslon">
											</div>
											<div class="form-group">
												<label for="visi">Visi Paslon</label>
												<input type="text" name="visi" id="visi" class="form-control" placeholder="Visi Paslon">
											</div>
											<div class="form-group">
												<label for="misi">Misi Paslon</label>
												<textarea name="misi" class="form-control" id="misi" cols="30" rows="3" placeholder="Misi Calon"></textarea>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-xs-4">
									<div class="box box-success">
										<div class="box-body">
											<div class="form-group">
												<label for="nama_paslon">Foto Paslon</label>
												<input type="file" name="foto" id="foto">
											</div>
											<button id="submit" type="submit" class="btn btn-success btn-flat btn-block">Simpan</button>
										</div>
									</div>
								</div>
							</div>
						</form>
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
  