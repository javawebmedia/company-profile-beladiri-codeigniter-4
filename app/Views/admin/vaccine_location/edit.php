<?php 
echo form_open(base_url('admin/vaccine_location/edit/'.$vaccine_location->vaccine_location_id)); 
echo csrf_field(); 
?>

<div class="form-group row">
					<label class="col-3">Vaccine Name</label>
					<div class="col-9">
						<input location="text" name="vaccine_location_name" class="form-control" placeholder="Vaccine name" value="<?php echo $vaccine_location->vaccine_location_name ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Address</label>
					<div class="col-9">
						<textarea name="vaccine_location_address" placeholder="Address" class="form-control"><?php echo $vaccine_location->vaccine_location_address ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Google Map</label>
					<div class="col-9">
						<textarea name="google_map" placeholder="Google Map" class="form-control"><?php echo $vaccine_location->google_map ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine location status</label>
					<div class="col-9">
						<select name="vaccine_location_status" class="form-control">
							<option value="Active">Active</option>
							<option value="Non Active" <?php if($vaccine_location->vaccine_location_status=='Non Active') { echo 'selected'; } ?>>Non Active</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine location description</label>
					<div class="col-9">
						<textarea name="vaccine_location_description" placeholder="description" class="form-control"><?php echo $vaccine_location->vaccine_location_description ?></textarea>
					</div>
				</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button location="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</div>

<?php echo form_close(); ?>