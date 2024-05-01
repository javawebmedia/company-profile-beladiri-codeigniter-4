<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/patient'), ' method="get"') ?>
		<div class="input-group">
          <input type="text" name="keywords" class="form-control" placeholder="Keywords..." value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" required>
          <span class="input-group-append">
            <button type="submit" name="submit" value="Cari" class="btn btn-info btn-flat">
            	<i class="fa fa-search"></i> Cari
            </button>
            <a href="<?php echo base_url('admin/patient/tambah') ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Tambah Baru
			</a>
          </span>
        </div>
        <?php echo form_close() ?>
	</div>
	<div class="col-md-6">
			<?php if(isset($pagination)) { echo str_replace('index.php/','',$pagination); } ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/patient/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/','',CURRENT_URL()) ?>">
<div class="mailbox-controls">
<div class="input-group">
	<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Berita">
		<i class="fa fa-trash"></i>
	</button>
	<button type="submit" name="submit" value="Pending" class="btn btn-dark" title="Pending">
		<i class="fa fa-eye-slash"></i>
	</button>
	<button type="submit" name="submit" value="Approved" class="btn btn-info" title="Approved">
		<i class="fa fa-eye"></i>
	</button>
	<select name="gender" class="form-control">

		<option value="Male">Male</option>
		<option value="Female">Female</option>
		
	</select>
	<span class="input-group-append">
		<button type="submit" name="submit" value="Update" class="btn btn-warning">
			<i class="fa fa-search"></i> Update
		</button>
	</span>
</div>



<div class="table-responsive mailbox-messages mt-2">		

<table class="table table-sm table-hover" id="example1">
	<thead>
		<tr class="bg-light">
			<th width="5%" class="text-center">
				<button type="button" class="btn btn-default btn-sm checkbox-toggle">
					<i class="far fa-square"></i>
        		</button>
			</th>
			<th width="20%">Name</th>
			<th width="10%">ID Card</th>
			<th width="15%">Email</th>
			<th width="10%">DOB</th>
			<th width="10%">Gender</th>
			<th width="15%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($patient as $patient) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
					<input type="checkbox" name="patient_id[]" value="<?php echo $patient->patient_id ?>" id="check_<?php echo $no ?>">
					<label for="check_<?php echo $no ?>"></label>
				</div>
				<?php echo $no ?>
			</td>
			
			<td><?php echo $patient->full_name ?>
				<small>
					<br><i class="fa fa-envelope"></i> <?php echo $patient->first_name ?>
					<br><i class="fa fa-phone"></i> <?php echo $patient->last_name ?>
				</small>
			</td>

			<td><?php echo $patient->id_card_number ?></td>
			<td><?php echo $patient->email ?></td>
			<td><?php echo date('d-m-Y',strtotime($patient->date_of_birth)) ?></td>

			<td class="text-center">
				<?php if($patient->gender=='Male') { ?>
					<span class="badge badge-secondary"><i class="fa fa-male"></i> Male</span>
				<?php }else{ ?>
					<span class="badge badge-secondary"><i class="fa fa-female"></i> Female</span>
				<?php } ?>
			</td>

			<td class="text-center">
				
				<?php if($patient->patient_status=='Approved') { ?>
					<span class="badge bg-info">
						<i class="fa fa-eye"></i> <?php echo $patient->patient_status ?>
					</span>
				<?php }else{ ?>
					<span class="badge bg-secondary">
						<i class="fa fa-eye-slash"></i> <?php echo $patient->patient_status ?>
					</span>
				<?php } ?>
				
			</td>
			<td>
				
				<a href="<?php echo base_url('admin/patient/edit/'.$patient->patient_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/patient/delete/'.$patient->patient_id) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</div>
</div>