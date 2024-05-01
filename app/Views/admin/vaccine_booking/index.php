<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/vaccine_booking'), ' method="get"') ?>
		<div class="input-group">
          <input type="text" name="keywords" class="form-control" placeholder="Keywords..." value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" required>
          <span class="input-group-append">
            <button type="submit" name="submit" value="Cari" class="btn btn-info btn-flat">
            	<i class="fa fa-search"></i> Search
            </button>
            
          </span>
        </div>
        <?php echo form_close() ?>
	</div>
	<div class="col-md-6">
			<?php if(isset($pagination)) { echo str_replace('index.php/','',$pagination); } ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/vaccine_booking/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php','',CURRENT_URL()) ?>">
<div class="mailbox-controls">
<div class="input-group">
	<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Berita">
		<i class="fa fa-trash"></i>
	</button>
	
	<select name="vaccine_booking_status" class="form-control">
		<option value="Verified">Verified</option>
		<option value="Scheduled">Scheduled</option>
		<option value="Denied">Denied</option>
		<option value="Pending">Pending</option>
	</select>
	<input type="text" name="vaccine_date" class="form-control tanggal" placeholder="Vaccine date status changed: dd-mm-yyyy">
	<span class="input-group-append">
		<button type="submit" name="submit" value="Update" class="btn btn-warning">
			<i class="fa fa-search"></i> Update
		</button>
	</span>
</div>

<div class="table-responsive mailbox-messages mt-1">		

<table class="table table-sm table-hover" id="example2">
	<thead>
		<tr class="text-left bg-light">
			<th width="5%" class="text-center">
				<button type="button" class="btn btn-default btn-sm checkbox-toggle">
					<i class="far fa-square"></i>
        </button>
			</th>
			<th width="12%">Booking Code</th>
			<th width="20%">Patient</th>
			<th width="10%">Booking Date</th>
			<th width="10%">Vaccine Date</th>
			<th width="12%">Vaccine Type</th>
			<th width="12%">Location</th>
			<th width="10%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($vaccine_booking as $vaccine_booking) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
          <input type="checkbox" name="vaccine_booking_id[]" value="<?php echo $vaccine_booking->vaccine_booking_id ?>" id="check_<?php echo $no ?>">
          <label for="check_<?php echo $no ?>"></label>
        </div>
				<?php echo $no ?>
			</td>
			<td class="text-center"><?php echo $vaccine_booking->vaccine_booking_code ?></td>
			<td><?php echo $vaccine_booking->full_name ?></td>
			<td><?php echo date('d-m-Y',strtotime($vaccine_booking->vaccine_booking_date)) ?></td>
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
				<a href="<?php echo base_url('admin/vaccine_booking/detail/'.$vaccine_booking->vaccine_booking_code) ?>" class="btn btn-outline-info btn-xs"><i class="fa fa-eye"></i> Detail</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</div>
</div>
<?php echo form_close(); ?>