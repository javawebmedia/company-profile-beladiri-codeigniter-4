<div class="callout callout-info bg-light">
	Hai <strong><em class="text-success"><?php echo Session()->get('nama') ?></em></strong>, Selamat datang di <strong><?php echo $this->website->namaweb() ?></strong>
</div>

<!-- Info boxes -->
<div class="row">
	<div class="col-12 col-sm-6 col-md-6">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-check"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Patient Data</span>
				<span class="info-box-number">
					<a href="<?php echo base_url('admin/patient') ?>" class="btn btn-xs btn-outline-success">
						<i class="fa fa-calendar-check"></i> Read more
					</a>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-6">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-circle"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Vaccine Booking</span>
				<span class="info-box-number">
					<a href="<?php echo base_url('admin/vaccine_booking') ?>" class="btn btn-xs btn-outline-success">
						<i class="fa fa-check-circle"></i> Read more
					</a>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<?php if(Session()->get('akses_level')=='Admin') { ?>
		<div class="col-12 col-sm-6 col-md-6">
			<div class="info-box">
				<span class="info-box-icon bg-success elevation-1"><i class="fas fa-leaf"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Vaccine Type</span>
					<span class="info-box-number">
						<a href="<?php echo base_url('admin/vaccine_type') ?>" class="btn btn-xs btn-outline-success">
							<i class="fa fa-users"></i> Read more
						</a>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-12 col-sm-6 col-md-6">
			<div class="info-box mb-3">
				<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-map"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Vaccine Location</span>
					<span class="info-box-number">
						<a href="<?php echo base_url('admin/vaccine_location') ?>" class="btn btn-xs btn-outline-success">
							<i class="fa fa-graduation-cap"></i> Read more
						</a>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		
	<?php } ?>
</div>
        <!-- /.row -->