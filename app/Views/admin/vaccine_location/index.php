<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example3">
	<thead>
		<tr class="bg-secondary text-center">
			<th width="5%">No</th>
			<th width="20%">Name</th>
			<th width="20%">Address</th>
			<th width="20%">Google Map</th>
			<th width="20%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($vaccine_location as $vaccine_location) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $vaccine_location->vaccine_location_name ?></td>
			<td><?php echo $vaccine_location->vaccine_location_address ?></td>
			<td><?php echo $vaccine_location->google_map ?></td>
			<td><?php echo $vaccine_location->vaccine_location_status ?></td>
			<td>
				<a href="<?php echo base_url('admin/vaccine_location/edit/'.$vaccine_location->vaccine_location_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/vaccine_location/delete/'.$vaccine_location->vaccine_location_id) ?>" class="btn btn-dark btn-sm delete-link"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>