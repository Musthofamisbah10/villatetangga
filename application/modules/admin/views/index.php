<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Admin
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Username</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($admin as $row): ?>
				<tr>
					<td width="20px"><?= ++$page  ?></td>
					<td><?= $row->nama_admin ?></td>
					<td><?= $row->username ?></td>
					<td width="20px"><a href="<?= site_url('admin/update/').$row->id_admin ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_admin?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('admin/delete/'.$row->id_admin) ?>" onclick="return confirm('Apakah kamu ingin menghapus data admin <?=$row->id_admin?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalAdmin" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAdminLabel">Input Data Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/add') ?>" method="post">
					<div class="form-group">
						<label for="nama_admin">Nama</label>
						<input type="text" name="nama_admin" class="form-control" id="nama_admin" placeholder="input name">
						<?php echo form_error('nama_admin', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="input username">
						<?php echo form_error('username', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="nama_admin">Password</label>
						<input type="text" name="password" class="form-control" id="password" placeholder="input password">
						<?php echo form_error('password', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Admin</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($admin as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_admin ?>" tabindex="-1" role="dialog" aria-labelledby="modalAdmin" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAdminLabel">Edit Data Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/update') ?>" method="post">
						<input type="hidden" value="<?= $row->id_admin ?>" name="id_admin" class="form-control" >
						<div class="form-group">
							<label for="nama_admin">Nama</label>
							<input type="text" name="nama_admin" autocomplete="off" class="form-control" value="<?= $row->nama_admin ?>">
							<?php echo form_error('nama_admin', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" autocomplete="off" class="form-control" value="<?= $row->username ?>">
							<?php echo form_error('username', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="nama_admin">Password</label>
							<input type="password" name="password" autocomplete="off" class="form-control" value="<?= $row->password ?>">
							<?php echo form_error('password', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update Data Admin</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>