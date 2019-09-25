<div class="container-fluid">
	<h4><i class="fas fa-user"></i> <?= $header ?></h4>
	<!-- flashdatas -->
	<?php echo $this->session->flashdata('success') ?>
	<!-- Button trigger modal -->
	<button class="btn btn-sm btn-primary rounded-pill mb-3 float-right " data-toggle="modal" data-target="#addModal">
		<i class="fas fa-plus"></i> Add Data Facilities	
	</button>
	<!-- <button class="btn btn-sm btn-info rounded-pill mb-3" ><i class="fas fa-eye"></i> Detile</button> -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Facilities</th>
					<th>Icon</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($facilities as $row): ?>
				<tr>
					<td width="20px"><?= ++$page  ?></td>
					<td><?= $row->name_facilities ?></td>
					<td><?= $row->icon_facilities ?></td>
					<td width="20px"><a href="<?= site_url('facilities/update/'.$row->id_facilities) ?>" class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#editModal<?=$row->id_facilities?>">Edit</a></td>
					<td width="20px"><a href="<?= site_url('facilities/delete/'.$row->id_facilities) ?>" onclick="return confirm('Apakah kamu ingin menghapus data facilities <?=$row->id_facilities?>')" class="btn btn-sm btn-danger rounded-pill">Delete</a></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalfacilities" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalfacilitiesLabel">Input Data Facilities</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('facilities/add') ?>" method="post">
					<div class="form-group">
						<label for="name_facilities">Name facilities</label>
						<input type="text" name="name_facilities" class="form-control" placeholder="input facilities">
						<?php echo form_error('name_facilities', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="form-group">
						<label for="icon_facilities">Icon</label>
						<input type="text" name="icon_facilities" class="form-control" placeholder="input icon facilities">
						<?php echo form_error('icon_facilities', '<div class="text-danger small ml-3">') ?>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add Data Facilities</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<?php foreach ($facilities as $row): ?>
	<div class="modal fade" id="editModal<?= $row->id_facilities ?>" tabindex="-1" role="dialog" aria-labelledby="modalfacilities" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalfacilitiesLabel">Edit Data Facilities</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('facilities/update') ?>" method="post">
						<input type="hidden" class="form-control" name="id_facilities" value="<?= $row->id_facilities ?>">
						<div class="form-group">
							<label for="name_facilities">Name facilities</label>
							<input type="text" name="name_facilities" class="form-control" value="<?= $row->name_facilities ?>">
							<?php echo form_error('name_facilities', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="form-group">
							<label for="icon_facilities">Icon facilities</label>
							<input type="text" name="icon_facilities" class="form-control" value="<?= $row->icon_facilities ?>">
							<?php echo form_error('icon_facilities', '<div class="text-danger small ml-3">') ?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update Data Facilities</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>