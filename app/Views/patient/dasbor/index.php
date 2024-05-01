<div class="row">
	<div class="col-md-3">

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
	<div class="col-md-9">

		<div class="card">
			<div class="card-header bg-light">
				<strong>Your vaccine booking schedule</strong>
			</div>
			<div class="card-body">

				<?php echo view('patient/booking/index') ?>

			</div>
		</div>


	</div>
</div>