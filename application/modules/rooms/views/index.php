<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Rooms	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name Room</th>
					<th>Room</th>
					<th>Badroom</th>
					<th>Full Room</th>
					<th>Facilities Room</th>
					<th>Diskription</th>
					<th>Price</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($room as $row): ?>
				<tr>
					<td width="20px"><?= $no++  ?></td>
					<td><?= $row->nama_room ?></td>
					<td><img src="<?= base_url('uploads/rooms/'.$row->photo_room) ?>" width="70" alt=""></td>
					<td><img src="<?= base_url('uploads/badroom/'.$row->kamar_mandi) ?>" width="70" alt=""></td>
					<td><img src="<?= base_url('uploads/fullroom/'.$row->halaman) ?>" width="70" alt=""></td>
					<td><img src="<?= base_url('uploads/facilitiesroom/'.$row->fasilitas_room) ?>" width="70" alt=""></td>
					<td><?= $row->diskrip_room ?></td>
					<td><?= $row->harga ?></td>
					<td width="20px"><a href="<?= site_url('rooms/update/'.$row->id_room) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_room?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('rooms/delete/'.$row->id_room) ?>" onclick="return confirm('Apakah kamu ingin menghapus data room <?=$row->id_room?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalroom" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalroomLabel">Input Data Rooms</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('rooms/add'); ?>
					<div class="form-group">
						<label for="nama_room">Name Room</label>
						<input type="text" name="nama_room" class="form-control" placeholder="input Room">
						<?php echo form_error('nama_room', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="status_id">Status Room</label>
						<select name="status_id" class="form-control">
							<?php foreach ($status as $row): ?>
								<option value="<?= $row->status_id ?>"><?= $row->nama_status ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="diskrip_room">Diskription</label>
						<input type="text" name="diskrip_room" class="form-control" placeholder="input diskription room">
						<?php echo form_error('diskrip_room', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="harga">Price</label>
						<input type="text" name="harga" class="form-control" placeholder="input harga room">
						<?php echo form_error('harga', '<div class="text-danger small ml-3">') ?>
					</div>

					<div class="form-group">
						<label for="photo_room">Photo Room</label>
						<input type="file" name="photo_room" class="form-control-file">
					</div>

					<div class="form-group">
						<label for="badroom">Badroom</label>
						<input type="file" name="badroom" class="form-control-file">
					</div>

					<div class="form-group">
						<label for="fullroom">Full Room</label>
						<input type="file" name="fullroom" class="form-control-file">
					</div>

					<div class="form-group">
						<label for="facilitiesroom">Facilities Room</label>
						<input type="file" name="facilitiesroom" class="form-control-file">
					</div>

					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Rooms</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($room as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_room ?>" tabindex="-1" role="dialog" aria-labelledby="modalRoom" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalRoomLabel">Edit Data Rooms</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open_multipart('rooms/update'); ?>
						<div class="form-group">
							<input type="hidden" name="id_room" value="<?= $row->id_room ?>" class="form-control">
							<label for="nama_room">Name Room</label>
							<input type="text" name="nama_room" class="form-control" value="<?= $row->nama_room ?>">
							<?php echo form_error('nama_room', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="Status_room">Status Room</label>
							<select name="status_id" class="form-control">
								<option value="sasa">asas</option>
								<?php foreach ($status as $st): ?>
									<?php if ( $st->status_id == $status->status_id ): ?>
									<option value="<?= $st->status_id ?>" selected><?= $st->nama_status ?></option>
									<?php else: ?>
									<option value="<?= $st->status_id ?>" selected><?= $st->nama_status ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="Diskrip">Diskription</label>
							<input type="text" name="diskrip_room" class="form-control" value="<?= $row->diskrip_room ?>">
							<?php echo form_error('diskrip_room', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="harga">Price</label>
							<input type="text" name="harga" class="form-control" value="<?= $row->harga ?>">
							<?php echo form_error('harga', '<div class="text-danger small ml-3">') ?>
						</div>

						<div class="form-group">
							<label for="photo_room">Photo Room</label>
							<input type="file" name="photo_room" class="form-control-file">
							<input type="hidden" name="old_photo_room" value="<?= $row->photo_room ?>">
						</div>
						
						<div class="form-group">
							<label for="badroom">Badroom</label>
							<input type="file" name="badroom" class="form-control-file">
							<input type="hidden" name="old_badroom" value="<?= $row->kamar_mandi ?>">
						</div>

						<div class="form-group">
							<label for="fullroom">Full Room</label>
							<input type="file" name="fullroom" class="form-control-file">
							<input type="hidden" name="old_fullroom" value="<?= $row->halaman ?>">
						</div>

						<div class="form-group">
							<label for="facilitiesroom">Facilities Room</label>
							<input type="file" name="facilitiesroom" class="form-control-file">
							<input type="hidden" name="old_facilitiesroom" value="<?= $row->fasilitas_room ?>">
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update Data Rooms</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>