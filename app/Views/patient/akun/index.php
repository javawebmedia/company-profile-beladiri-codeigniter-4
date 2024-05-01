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
				<strong>Your account data</strong>
			</div>
			<div class="card-body">

				<p class="text-right">

					<a href="<?php echo base_url('patient/akun/edit') ?>" class="btn btn-info">
						<i class="fa fa-edit"></i> Update Profile
					</a>

					<a href="<?php echo base_url('patient/akun/password') ?>" class="btn btn-secondary">
						<i class="fa fa-lock"></i> Change Password
					</a>

				</p>

				<table class="table table-bordered table-sm">
					<thead>
						<tr>
							<th width="25%">ID Card Number</th>
							<th><?php echo $patient->id_card_number ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>First name</td>
							<td><?php echo $patient->first_name ?></td>
						</tr>
						<tr>
							<td>Last name</td>
							<td><?php echo $patient->last_name ?></td>
						</tr>
						<tr>
							<td>Full name</td>
							<td><?php echo $patient->full_name ?></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td><?php echo date('d-m-Y',strtotime($patient->date_of_birth)) ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $patient->email ?></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><?php echo $patient->phone_number ?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><?php echo $patient->gender ?></td>
						</tr>
						<tr>
							<td>Weight</td>
							<td><?php echo $patient->weight ?></td>
						</tr>
						<tr>
							<td>Home Address</td>
							<td><?php echo $patient->home_address ?></td>
						</tr>
						<tr>
							<td>Patient Status</td>
							<td><?php echo $patient->patient_status ?></td>
						</tr>
						<tr>
							<td>Date created</td>
							<td><?php echo $patient->date_created ?></td>
						</tr>
						<tr>
							<td>Date updated</td>
							<td><?php echo $patient->date_updated ?></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>


	</div>
</div>