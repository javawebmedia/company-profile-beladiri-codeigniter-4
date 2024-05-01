<div class="row">
	<div class="col-md-4">

		<div class="card">
			<div class="card-header bg-light">
				<strong>Your Account</strong>
			</div>
			<div class="card-body box-profile">
				<!-- start profile -->
				<div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('assets/admin/dist/img/boxed-bg.jpg') ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $patient->full_name ?></h3>

                <p class="text-muted text-center"><?php echo $patient->email ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Date of Birth</b> <a class="float-right"><?php echo date('d-m-Y',strtotime($patient->date_of_birth)) ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?php echo $patient->gender ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>ID Card Number</b> <a class="float-right"><?php echo $patient->id_card_number ?></a>
                  </li>
                </ul>

                <a href="<?php echo base_url('patient/akun') ?>" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                <!-- end start profile -->
			</div>
		</div>

	</div>
	<div class="col-md-8">

		<div class="card">
			<div class="card-header bg-light">
				<strong>Change your password</strong>
			</div>
			<div class="card-body">

				<?php echo form_open(base_url('patient/akun/password')) ?>

				<div class="form-group row">
					<label class="col-md-3">New password</label>
					<div class="col-md-9">
						<input type="password" name="password" class="form-control" minlength="6" maxlength="32" placeholder="New password. Minimum 6 characters and maximum 32 characters" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-3">Password confirmation</label>
					<div class="col-md-9">
						<input type="password" name="password_confirmation" class="form-control" minlength="6" maxlength="32" placeholder="Password confirmation" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-3"></label>
					<div class="col-md-9">
						<button type="submit" name="submit" class="btn btn-success">
							<i class="fa fa-save"></i> Change Password Now
						</button>
					</div>
				</div>


				<?php echo form_close() ?>

			</div>
		</div>


	</div>
</div>