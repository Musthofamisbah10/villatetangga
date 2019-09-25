<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Villa	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Address</th>
					<th>Tetanga</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($villa as $row): ?>
				<tr>
					<td width="20px"><?= $no++  ?></td>
					<td><?= $row->nama_villa ?></td>
					<td><?= $row->alamat ?></td>
					<td><?= $row->tetanga ?></td>
					<td width="20px"><a href="<?= site_url('villa/update/'.$row->id_villa) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_villa?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('villa/delete/'.$row->id_villa) ?>" onclick="return confirm('Apakah kamu ingin menghapus data customer <?=$row->id_villa?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalAboutVilla" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAboutVillaLabel">Input Data About</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('villa/add') ?>" method="post">
					<div class="form-group">
						<label for="nama villa">Name villa</label>
						<input type="text" name="nama_villa" class="form-control" placeholder="input villa">
						<?php echo form_error('nama_villa', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" placeholder="input email">
						<?php echo form_error('email', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="handphone">Handphone</label>
						<input type="text" name="handphone" class="form-control" placeholder="input handphone">
						<?php echo form_error('handphone', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="alamat">Address</label>
						<textarea class="form-control" name="alamat" rows="4" cols="50"></textarea>
						<?php echo form_error('alamat', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="tetanga">Tetanga</label>
						<textarea class="form-control" name="tetanga" rows="4" cols="50"></textarea>
						<?php echo form_error('tetanga', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Villa</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($villa as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_villa ?>" tabindex="-1" role="dialog" aria-labelledby="modalAboutVilla" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAboutVillaLabel">Edit About Villa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('villa/update') ?>" method="post">			
						<div class="form-group">
							<input type="hidden" name="id_villa" value="<?= $row->id_villa ?>" class="form-control">
							<label for="nama villa">Name villa</label>
							<input type="text" name="nama_villa" class="form-control" value="<?= $row->nama_villa ?>">
							<?php echo form_error('nama_villa', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" value="<?= $row->email ?>">
							<?php echo form_error('email', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="handphone">Handphone</label>
							<input type="text" name="handphone" class="form-control" value="<?= $row->handphone ?>">
							<?php echo form_error('handphone', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="alamat">Address</label>
							<textarea class="form-control" name="alamat" rows="4" cols="50"><?= $row->alamat ?></textarea>
							<?php echo form_error('alamat', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="tetanga">Tetanga</label>
							<textarea class="form-control" name="tetanga" rows="4" cols="50"><?= $row->tetanga ?></textarea>
							<?php echo form_error('tetanga', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Edit About Villa</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>