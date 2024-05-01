<div class="container">
	<div class="row">
        <div class="col-md-8 offset-md-2">
        	<br><br>
        	<h4 class="text-center">Registration Success</h4>

        	<p>Below is your registration data.</p>

        	<table class="table table-bordered table-sm">
        		<thead>
        			<tr>
        				<th width="25%">Booking code</th>
        				<th><?php echo $vaccine_booking->vaccine_booking_code ?></th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>First name</td>
        				<td><?php echo $vaccine_booking->first_name ?></td>
        			</tr>
        			<tr>
        				<td>Last name</td>
        				<td><?php echo $vaccine_booking->last_name ?></td>
        			</tr>
        			<tr>
        				<td>Date of birth</td>
        				<td><?php echo $vaccine_booking->date_of_birth ?></td>
        			</tr>
        			<tr>
        				<td>Identity Card Number</td>
        				<td><?php echo $vaccine_booking->id_card_number ?></td>
        			</tr>
        			<tr>
        				<td>Vaccine type</td>
        				<td><?php echo $vaccine_booking->vaccine_type_name ?></td>
        			</tr>
        			<tr>
        				<td>Vaccine location</td>
        				<td><?php echo $vaccine_booking->vaccine_location_name ?></td>
        			</tr>
        			<tr>
        				<td>Vaccine booking date</td>
        				<td><?php echo $vaccine_booking->vaccine_booking_date ?></td>
        			</tr>
        			<tr>
        				<td>Note</td>
        				<td><?php echo $vaccine_booking->description ?></td>
        			</tr>
        		</tbody>
        	</table>
        </div>
    </div>
</div>