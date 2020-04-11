

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
        <li class="active"><a href="#"><i class="fa fa-archive"></i> <?= $title; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
					<div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">Nama Desa/Sekolah</h3>
                        </div>
						<div class="pull-right">
							<a href="<?= base_url('admin/pemilih/add') ?>" class="btn btn-flat btn-sm btn-success">Tambah Pemilih</a>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
                            <div class="col-xs-7">
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width:150px;">Jumlah Pemilih</th>
                                                        <th>Kelas/blok</th>
                                                        <th style="width:190px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>30</td>
                                                        <td>Blok Prapatan</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-flat btn-info">Lihat</button>
                                                                <button class="btn btn-flat btn-primary">Edit</button>
                                                                <button class="btn btn-flat btn-danger">Hapus</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">Jumlah Pemilih Keseluruhan</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="alert alert-success" style="overflow:hidden;">
                                            <span class="pull-left">Jumlah Pemilih</span>
                                            <span class="pull-right label label-primary">100</span>
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


  <!-- Modal -->
  <div class="modal fade" id="modalData">
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
									<img src="" id="foto" class="img-responsive img-thumbnail" alt="Foto Paslon">
								</div>
								<div class="col-sm-8">
									<table class="table table-striped">
										<tr>
											<th style="width:120px;">Nama Paslon</th>
											<th style="width:10px;">:</th>
											<td><span id="nama"></span></td>
										</tr>
										<tr>
											<th style="width:120px;">Visi</th>
											<th style="width:10px;">:</th>
											<td><p id="visi"></p></td>
										</tr>
										<tr>
											<th style="width:120px;">Misi</th>
											<th style="width:10px;">:</th>
											<td><p id="misi"></p></td>
										</tr>
									</table>
									<div class="alert alert-success" style="overflow:hidden;">
										<span class="pull-left">Jumlah Quick Count Sementara Adalah</span>
										<span class="pull-right"><b><span id="jml"></span> Suara</b></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Jam -->
					<div class="alert" id="waktu" style="background-color:#ccc;">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, esse.
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
  <!-- Modal -->
  <div class="modal fade" id="modalEdit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Paslon</h4>
				</div>
				<div class="modal-body">
					<div class="box box-primary">
						<div class="box-body">
							<form method="post" id="editData">
							<div class="row">
								<div class="col-sm-4">
									<div class="bungkus">
										<img src="<?= base_url('assets/dist/img/') ?>default.jpg" id="preview" class="img-responsive img-thumbnail" alt="Foto Paslon">
										<input type="file" name="userfile" id="userfile" onchange="prev(this, 'preview')" accept="image/*">
										<label for="userfile" id="labelphoto"><i class="fa fa-edit"></i></label>
									</div>
								</div>
								<div class="col-sm-8">
									<table class="table table-striped">
										<tr>
											<th style="width:120px;">Nama Paslon</th>
											<th style="width:10px;">:</th>
											<td><input type="text" name="nama" id="nama2" value="" class="form-control"></td>
										</tr>
										<tr>
											<th style="width:120px;">Visi</th>
											<th style="width:10px;">:</th>
											<td><input type="text" name="visi" id="visi2" value="" class="form-control"></td>
										</tr>
										<tr>
											<th style="width:120px;">Misi</th>
											<th style="width:10px;">:</th>
											<td><textarea name="misi" id="misi2" cols="30" rows="3" class="form-control"></textarea></td>
										</tr>
										<input type="hidden" name="id" id="id" value="">
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Jam -->
					<div class="progress active">
						<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" id="per" aria-valuemax="100">
							<span id="status"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" data-id="" class="btn btn-success pull-right" id="submitEdit">Save</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

  