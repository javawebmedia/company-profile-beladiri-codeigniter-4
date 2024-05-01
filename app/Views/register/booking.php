<div class="container">
	<div class="row">
        <div class="col-md-6 offset-3">
        	<br><br>
        	<h4 class="text-center">Online Registration</h4>

        	<p class="text-center">
        		<button class="btn btn-secondary">
        			1. Account Registration
        		</button>
        		<button class="btn btn-dark">
        			2. Vaccine Booking
        		</button>
        	</p>

        	<div class="alert alert-info">
        		<strong>Warning! </strong>Please fill this form with your identity correctly.
        	</div>

        	<?php 
        	$validation = \Config\Services::validation();
        	$errors = $validation->getErrors();
        	if(!empty($errors))
        	{
        		echo '<div class="alert alert-warning">'.$validation->listErrors().'</div>';
        	}
        	?>

        	<?php if (session('msg')) : ?>
        		<div class="alert alert-info alert-dismissible">
        			<?= session('msg') ?>
        			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        		</div>
        	<?php endif ?>

        	<?php echo form_open(base_url('register/booking')); ?>

				<input type="hidden" name="pengalihan" value="<?php echo Session()->get('pengalihan'); ?>">

				<div class="form-group mb-3">
					<label class="label" for="name">First Name <span class="text-danger">*</span></label>
					<input type="text" name="first_name" class="form-control form-control-lg" value="<?php echo $patient->first_name ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Last Name <span class="text-danger">*</span></label>
					<input type="text" name="last_name" class="form-control form-control-lg" value="<?php echo $patient->last_name ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Identity Card Number (NIK) <span class="text-danger">*</span></label>
					<input type="text" name="id_card_number" class="form-control form-control-lg" value="<?php echo $patient->id_card_number ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Date of Birth <span class="text-danger">*</span></label>
					<input type="date" name="date_of_birth" class="form-control form-control-lg" value="<?php echo $patient->date_of_birth ?>" readonly>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Vaccine Type <span class="text-danger">*</span></label>
					<select name="vaccine_type_id" class="form-control">

						<?php foreach($vaccine_type as $vaccine_type) { ?>

						<option value="<?php echo $vaccine_type->vaccine_type_id ?>">
							<?php echo $vaccine_type->vaccine_type_name ?>
						</option>

						<?php } ?>

					</select>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Vaccine Location <span class="text-danger">*</span></label>
					<select name="vaccine_location_id" class="form-control">

						<?php foreach($vaccine_location as $vaccine_location) { ?>

						<option value="<?php echo $vaccine_location->vaccine_location_id ?>">
							<?php echo $vaccine_location->vaccine_location_name ?>
						</option>
						
						<?php } ?>

					</select>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Date of Vaccine Booking <span class="text-danger">*</span></label>
					<input type="date" name="vaccine_booking_date" class="form-control form-control-lg" value="<?php echo set_value('vaccine_booking_date') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Additional Note </label>
					<textarea name="description" class="form-control" rows="3"><?php echo set_value('description') ?></textarea>
				</div>

				<div class="form-group">
					<button type="reset" name="reset" value="reset" class="btn btn-dark btn-lg">
						<i class="fa fa-times"></i> Reset
					</button>
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-lg">
						 Register <i class="fa fa-chevron-circle-right"></i>
					</button>
				</div>
				
			
			<?php echo form_close(); ?>
			<hr style="border-top: solid thin #666;">
			<p class="text-center">
				Back to <a href="<?php echo base_url() ?>">Homepage</a> | Already have an account? <a href="<?php echo base_url('signin') ?>">Login Here</a>
			</p>
			<br><br><br><br>
        </div>
    </div>
</div>