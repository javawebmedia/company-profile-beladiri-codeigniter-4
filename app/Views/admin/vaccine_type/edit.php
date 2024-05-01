<?php 
echo form_open(base_url('admin/vaccine_type/edit/'.$vaccine_type->vaccine_type_id)); 
echo csrf_field(); 
?>

<div class="form-group row">
					<label class="col-3">Vaccine Name</label>
					<div class="col-9">
						<input type="text" name="vaccine_type_name" class="form-control" placeholder="Vaccine name" value="<?php echo $vaccine_type->vaccine_type_name ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Origin</label>
					<div class="col-9">
						<input type="text" name="vaccine_type_origin" class="form-control" placeholder="Origin" value="<?php echo $vaccine_type->vaccine_type_origin ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine type status</label>
					<div class="col-9">
						<select name="vaccine_type_status" class="form-control">
							<option value="Active">Active</option>
							<option value="Non Active" <?php if($vaccine_type->vaccine_type_status=='Non Active') { echo 'selected'; } ?>>Non Active</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine type description</label>
					<div class="col-9">
						<textarea name="vaccine_type_description" placeholder="description" class="form-control"><?php echo $vaccine_type->vaccine_type_description ?></textarea>
					</div>
				</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</div>

<?php echo form_close(); ?>