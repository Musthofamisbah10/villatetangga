<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Testimoni	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name Guest</th>
					<th>Testimoni</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($testimoni as $row): ?>
				<tr>
					<td width="20px"><?= $no++  ?></td>
					<td><?= $row->nama_guest ?></td>
					<td><?= $row->testi ?></td>
					<td width="20px"><a href="<?= site_url('testimoni/update/'.$row->id_testi) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_testi?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('testimoni/delete/'.$row->id_testi) ?>" onclick="return confirm('Apakah kamu ingin menghapus data f <?=$row->id_testi?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTestimoni" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTestimoniLabel">Input Data Testimoni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('testimoni/add') ?>" method="post">
					<div class="form-group">
						<label for="id_guest">Name Guest</label>
						<select name="id_guest" class="form-control">
							<?php foreach ($guest as $row): ?>
								<option value="<?= $row->id_guest ?>"><?= $row->nama_guest ?></option>
							<?php endforeach; ?>
						</select>
						<?php echo form_error('id_guest', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="testi">Testimoni</label>
						<textarea class="form-control" name="testi" rows="4" cols="50"></textarea>
						<?php echo form_error('testi', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Testimoni</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Update -->
<?php foreach ($testimoni as $row): ?>
<div class="modal fade" id="editModal<?= $row->id_testi ?>" tabindex="-1" role="dialog" aria-labelledby="modalTestimoni" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTestimoniLabel">Update Data Testimoni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('testimoni/update') ?>" method="post">
					<div class="form-group">
						<input type="hidden" name="id_testi" value="<?= $row->id_testi ?>">
						<label for="d_guest">Name Guest</label>
						<select id="id_guest" name="id_guest" class="form-control">
							<?php foreach ($guest as $gst): ?>
								<?php if ( $gst->id_guest == $guest->$id_guest): ?>

									
								<?php else: ?>
									<option value="<?= $gst->id_guest ?>" selected><?= $gst->nama_guest ?></option>
									
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="testi">Testimoni</label>
						<textarea class="form-control" name="testi" rows="4" cols="50"><?= $row->testi ?></textarea>
						<?php echo form_error('testi', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update Data Testimoni</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>