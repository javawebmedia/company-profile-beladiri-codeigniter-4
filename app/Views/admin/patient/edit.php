<p class="text-right">
	<a href="<?php echo base_url('admin/patient') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/patient/edit/'.$patient->patient_id) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>
<input type="hidden" name="pengalihan" value="<?php echo Session()->get('pengalihan'); ?>">

				<div class="form-group mb-3">
					<label class="label" for="name">First Name <span class="text-danger">*</span></label>
					<input type="text" name="first_name" class="form-control form-control-lg" value="<?php echo $patient->first_name ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Last Name <span class="text-danger">*</span></label>
					<input type="text" name="last_name" class="form-control form-control-lg" value="<?php echo $patient->last_name ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Email (Username) <span class="text-danger">*</span></label>
					<input type="email" name="email" class="form-control form-control-lg"  value="<?php echo $patient->email ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Identity Card Number (NIK) <span class="text-danger">*</span></label>
					<input type="text" name="id_card_number" class="form-control form-control-lg" value="<?php echo $patient->id_card_number ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Date of Birth <span class="text-danger">*</span></label>
					<input type="date" name="date_of_birth" class="form-control form-control-lg" value="<?php echo $patient->date_of_birth ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Gender <span class="text-danger">*</span></label>
					<select name="gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female" <?php if($patient->gender=='Female') { echo 'selected'; } ?>>Female</option>
					</select>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Phone Number <span class="text-danger">*</span></label>
					<input type="text" name="phone_number" class="form-control form-control-lg" value="<?php echo $patient->phone_number ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Home Address <span class="text-danger">*</span></label>
					<textarea name="home_address" class="form-control" rows="3" required><?php echo $patient->home_address ?></textarea>
				</div>

				<div class="form-group">
					<button type="reset" name="reset" value="reset" class="btn btn-dark btn-lg">
						<i class="fa fa-times"></i> Reset
					</button>
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-lg">
						 Update my profile <i class="fa fa-chevron-circle-right"></i>
					</button>
				</div>

<?php echo form_close(); ?>