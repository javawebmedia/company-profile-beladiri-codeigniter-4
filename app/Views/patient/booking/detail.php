<p class="text-right">
	<a href="<?php echo base_url('patient/booking') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Back to Booking Page
	</a>
</p>

<table class="table table-bordered table-sm">
	<thead>
		<tr>
			<th width="25%">Booking code</th>
			<th><?php echo $vaccine_booking->vaccine_booking_code ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Vaccine Location</td>
			<td><?php echo $vaccine_booking->vaccine_location_name ?></td>
		</tr>
		<tr>
			<td>Vaccine Type</td>
			<td><?php echo $vaccine_booking->vaccine_type_name ?></td>
		</tr>
		<tr>
			<td>Vaccine Booking Date</td>
			<td><?php echo date('d-m-Y',strtotime($vaccine_booking->vaccine_booking_date)) ?></td>
		</tr>
		<tr>
			<td>Vaccine Date</td>
			<td><?php echo date('d-m-Y',strtotime($vaccine_booking->vaccine_date)) ?></td>
		</tr>
		<tr>
			<td>Vaccine Status</td>
			<td><?php echo $vaccine_booking->vaccine_booking_status ?></td>
		</tr>
		<tr>
			<td>Vaccine Description</td>
			<td><?php echo $vaccine_booking->description ?></td>
		</tr>
		<tr>
			<td>Vaccine Booking Date Registration</td>
			<td><?php echo $vaccine_booking->date_created ?></td>
		</tr>
		<tr>
			<td>Vaccine Booking Last Updated</td>
			<td><?php echo $vaccine_booking->date_updated ?></td>
		</tr>
		
	</tbody>
</table>