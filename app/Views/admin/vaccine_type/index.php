<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example3">
	<thead>
		<tr class="bg-secondary text-center">
			<th width="5%">No</th>
			<th width="25%">Name</th>
			<th width="25%">Origin</th>
			<th width="25%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($vaccine_type as $vaccine_type) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $vaccine_type->vaccine_type_name ?></td>
			<td><?php echo $vaccine_type->vaccine_type_origin ?></td>
			<td><?php echo $vaccine_type->vaccine_type_status ?></td>
			<td>
				<a href="<?php echo base_url('admin/vaccine_type/edit/'.$vaccine_type->vaccine_type_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/vaccine_type/delete/'.$vaccine_type->vaccine_type_id) ?>" class="btn btn-dark btn-sm delete-link"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>