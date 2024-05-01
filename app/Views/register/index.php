<div class="container">
	<div class="row">
        <div class="col-md-6 offset-3">
        	<br><br>
        	<h4 class="text-center">Online Registration</h4>

        	<p class="text-center">
        		<button class="btn btn-dark">
        			1. Account Registration
        		</button>
        		<button class="btn btn-secondary">
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

        	<?php echo form_open(base_url('register')); ?>

				<input type="hidden" name="pengalihan" value="<?php echo Session()->get('pengalihan'); ?>">

				<div class="form-group mb-3">
					<label class="label" for="name">First Name <span class="text-danger">*</span></label>
					<input type="text" name="first_name" class="form-control form-control-lg" value="<?php echo set_value('first_name') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Last Name <span class="text-danger">*</span></label>
					<input type="text" name="last_name" class="form-control form-control-lg" value="<?php echo set_value('last_name') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Email (Username) <span class="text-danger">*</span></label>
					<input type="email" name="email" class="form-control form-control-lg"  value="<?php echo set_value('email') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="password">Password <span class="text-danger">*</span></label>
					<input type="password" name="password" class="form-control form-control-lg" required>
					<small class="text-secondary">At least 6 characters and no more than 32 characters</small>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Identity Card Number (NIK) <span class="text-danger">*</span></label>
					<input type="text" name="id_card_number" class="form-control form-control-lg" value="<?php echo set_value('id_card_number') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Date of Birth <span class="text-danger">*</span></label>
					<input type="date" name="date_of_birth" class="form-control form-control-lg" value="<?php echo set_value('date_of_birth') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Gender <span class="text-danger">*</span></label>
					<select name="gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Phone Number <span class="text-danger">*</span></label>
					<input type="text" name="phone_number" class="form-control form-control-lg" value="<?php echo set_value('phone_number') ?>" required>
				</div>

				<div class="form-group mb-3">
					<label class="label" for="name">Home Address <span class="text-danger">*</span></label>
					<textarea name="home_address" class="form-control" rows="3" required><?php echo set_value('home_address') ?></textarea>
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