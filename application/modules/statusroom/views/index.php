<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Status Room	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Status</th>
					<th>Status Room</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($status as $row): ?>
				<tr>
					<td width="20px"><?= ++$page ?></td>
					<td><?= $row->kode_status ?></td>
					<td><?= $row->nama_status ?></td>
					<td width="20px"><a href="<?= site_url('statusroom/update/'.$row->status_id) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->status_id?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('statusroom/delete/'.$row->status_id) ?>" onclick="return confirm('Apakah kamu ingin menghapus data <?=$row->status_id?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalStatusRoom" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalStatusRoomLabel">Input Status Room</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('statusroom/add') ?>" method="post">
					<div class="form-group">
						<label for="kode_status">Kode Status Room</label>
						<input type="text" name="kode_status" class="form-control" placeholder="input kode room">
						<?php echo form_error('kode_status', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="nama_status">Status Room</label>
						<input type="text" name="nama_status" class="form-control" placeholder="input status room">
						<?php echo form_error('nama_status', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Status Room</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($status as $row): ?>
	<div class="modal fade" id="editModal<?= $row->status_id ?>" tabindex="-1" role="dialog" aria-labelledby="modalStatusRoom" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalStatusRoomLabel">Edit Data Status Room</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('statusroom/<u></u>pdate') ?>" method="post">
						<input type="hidden" class="form-control" name="status_id" value="<?= $row->status_id ?>">
						<div class="form-group">
							<label for="nama_status">Kode Status Room</label>
							<input type="text" name="kode_status" class="form-control" value="<?= $row->kode_status ?>">
							<?php echo form_error('kode_status', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="nama_status">Status Room</label>
							<input type="text" name="nama_status" class="form-control" value="<?= $row->nama_status ?>">
							<?php echo form_error('nama_status', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Ubah Data Status Room</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>