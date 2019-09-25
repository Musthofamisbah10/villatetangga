<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Galery	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Name Photo</th>
					<th>Photo</th>
					<th>Diskription</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($galery as $row): ?>
				<tr>
					<td width="20px"><?= ++$page  ?></td>
					<td><?= $row->nama_photo ?></td>
					<td><img src="<?= base_url('uploads/galery/'.$row->photo) ?>" width="70" alt=""></td>
					<td><?= $row->diskripsi ?></td>
					<td width="20px"><a href="<?= site_url('galery/update/'.$row->id_photo) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_photo?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('galery/delete/'.$row->id_photo) ?>" onclick="return confirm('Apakah kamu ingin menghapus data galery <?=$row->id_photo?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalGalery" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalGaleryLabel">Input Data Galery</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('galery/add'); ?>
					<div class="form-group">
						<label for="nama_photo">Name Photo</label>
						<input type="text" name="nama_photo" class="form-control" placeholder="input name">
						<?php echo form_error('nama_photo', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="diskripsi">Diskription</label>
						<input type="text" name="diskripsi" class="form-control" placeholder="input diskription">
						<?php echo form_error('diskripsi', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="photo">Photo</label>
						<input type="file" name="photo" class="form-control-file">
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Galery</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($galery as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_photo ?>" tabindex="-1" role="dialog" aria-labelledby="modalGalery" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalGaleryLabel">Edit Data Galery</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open_multipart('galery/update'); ?>
						<div class="form-group">
							<input type="hidden" name="id_photo" value="<?= $row->id_photo ?>">
							<label for="nama_photo">Name Photo</label>
							<input type="text" name="nama_photo" class="form-control" value="<?= $row->nama_photo ?>">
							<?php echo form_error('nama_photo', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="photo">Photo</label>
							<input type="file" name="photo" class="form-control-file">
							<input type="hidden" name="old_image" value="<?= $row->photo ?>">
							
						</div>
						<div class="form-group">
							<label for="Diskripsi">Diskription</label>
							<input type="text" name="diskripsi" class="form-control" value="<?= $row->diskripsi ?>">
							<?php echo form_error('diskripsi', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update Data Galery</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>