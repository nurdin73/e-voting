

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
						<div class="pull-right">
							<a href="<?= base_url('admin/calon/add') ?>" class="btn btn-flat btn-sm btn-success">Tambah Calon</a>
						</div>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="dataTable">
								<thead>
									<tr>
										<th>No.</th>
										<th>Foto</th>
										<th>Nama Paslon</th>
										<th>Visi</th>
										<th style="text-align:center;">Aksi</th>
									</tr>
								</thead>
								<tbody id="data-paslon">
									<?php $no = 1; ?>
									<?php foreach($calon as $c) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><img src="<?= base_url('assets/dist/img/img-calon/').$c['foto_calon']; ?>" alt="" class="img-thumbnail img-fluid" style="width:100px;"></td>
										<td><?= $c['nama_calon'] ?></td>
										<td><?= $c['visi'] ?></td>
										<td style="text-align:center;">
											<div class="btn-group">
												<button class="btn btn-info btn-flat detail" data-id="<?= encrypt_url($c['id']) ?>" data-toggle="modal" data-target="#modalData"><i class="fa fa-book"></i></button>
												<button class="btn btn-primary btn-flat edit" data-id="<?= encrypt_url($c['id']) ?>" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger btn-flat hapus" data-id="<?= encrypt_url($c['id']) ?>" ><i class="fa fa-trash"></i></button>
											</div>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
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

  