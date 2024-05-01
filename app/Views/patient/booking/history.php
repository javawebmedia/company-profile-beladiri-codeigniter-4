<table class="table table-bordered table-sm">
	<thead>
		<tr class="text-center">
			<th>No</th>
			<th>Vaccine Code</th>
			<th>Vacccine Date</th>
			<th>Vaccine Type</th>
			<th>Vacccine Location</th>
			<th>Vacccine Status</th>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($vaccine_booking as $vaccine_booking) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td class="text-center"><?php echo $vaccine_booking->vaccine_booking_code ?></td>
			<td><?php echo date('d-m-Y',strtotime($vaccine_booking->vaccine_date)) ?></td>
			<td><?php echo $vaccine_booking->vaccine_type_name ?></td>
			<td><?php echo $vaccine_booking->vaccine_location_name ?></td>

			<td class="text-center">

				<?php if($vaccine_booking->vaccine_booking_status=='Pending') { ?>
					
					<span class="badge badge-warning">
						<i class="fa fa-clock"></i> <?php echo $vaccine_booking->vaccine_booking_status ?>
					</span>

			    <?php }elseif($vaccine_booking->vaccine_booking_status=='Verified') { ?>

			    	<span class="badge badge-success">
						<i class="fa fa-check-circle"></i> <?php echo $vaccine_booking->vaccine_booking_status ?>
					</span>

				<?php }elseif($vaccine_booking->vaccine_booking_status=='Denied') { ?>

			    	<span class="badge badge-danger">
						<i class="fa fa-times-circle"></i> <?php echo $vaccine_booking->vaccine_booking_status ?>
					</span>

				<?php }elseif($vaccine_booking->vaccine_booking_status=='Scheduled') { ?>

			    	<span class="badge badge-info">
						<i class="fa fa-calendar-check"></i> <?php echo $vaccine_booking->vaccine_booking_status ?>
					</span>

			    <?php } ?>

			</td>

			<td>
				<a href="<?php echo base_url('patient/booking/detail/'.$vaccine_booking->vaccine_booking_code) ?>" class="btn btn-outline-info btn-xs"><i class="fa fa-eye"></i> Detail</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>