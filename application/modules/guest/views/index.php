<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right ml-2" data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Guest	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Phone</th>
					<th>City</th>
					<th>Country</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($guest as $row): ?>
				<tr>
					<td width="20px"><?= ++$page  ?></td>
					<td><?= $row->nama_guest ?></td>
					<td><?= $row->tlp_guest ?></td>
					<td><?= $row->kota ?></td>
					<td><?= $row->negara ?></td>
					<td width="20px"><a href="<?= site_url('guest/update/'.$row->id_guest) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_guest?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('guest/delete/'.$row->id_guest) ?>" onclick="return confirm('Apakah kamu ingin menghapus data guest <?=$row->id_guest?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalguest" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalguestLabel">Input Data Guest</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('guest/add') ?>" method="post">
					<div class="form-group">
						<label for="nama_guest">Name</label>
						<input type="text" name="nama_guest" class="form-control" placeholder="input guest name">
						<?php echo form_error('nama_guest', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="tlp_guest">Phone Number</label>
						<input type="text" name="tlp_guest" class="form-control" placeholder="input phone number">
						<?php echo form_error('tlp_guest', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="kota">City</label>
						<input type="text" name="kota" class="form-control" placeholder="input city">
						<?php echo form_error('kota', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="negara">Negara</label>
						<input type="text" name="negara" class="form-control" placeholder="input negara">
						<?php echo form_error('negara', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Guest</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($guest as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_guest ?>" tabindex="-1" role="dialog" aria-labelledby="modalguest" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalguestLabel">Edit Data Guest</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('guest/update') ?>" method="post">
						<div class="form-group">
							<input type="hidden" name="id_guest" value="<?= $row->id_guest ?>" class="form-control">
							<label for="nama_guest">Name</label>
							<input type="text" name="nama_guest" class="form-control" value="<?= $row->nama_guest ?>">
							<?php echo form_error('nama_guest', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="tlp_guest">Phone Number</label>
							<input type="text" name="tlp_guest" class="form-control" value="<?= $row->tlp_guest ?>">
							<?php echo form_error('tlp_guest', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="kota">City</label>
							<input type="text" name="kota" class="form-control" value="<?= $row->kota ?>">
							<?php echo form_error('kota', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="negara">Negara</label>
							<input type="text" name="negara" class="form-control" value="<?= $row->negara ?>">
							<?php echo form_error('negara', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update Data Guest</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>