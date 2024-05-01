<p>
	<button location="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Add New
	</button>
</p>
<?php 
echo form_open(base_url('admin/vaccine_location')); 
echo csrf_field(); 
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add new</h4>
				<button location="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Vaccine Location</label>
					<div class="col-9">
						<input location="text" name="vaccine_location_name" class="form-control" placeholder="Vaccine Location" value="<?php echo set_value('vaccine_location_name') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Address</label>
					<div class="col-9">
						<textarea name="vaccine_location_address" placeholder="Address" class="form-control"><?php echo set_value('vaccine_location_address') ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Google Map</label>
					<div class="col-9">
						<textarea name="google_map" placeholder="Google Map" class="form-control"><?php echo set_value('google_map') ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine location status</label>
					<div class="col-9">
						<select name="vaccine_location_status" class="form-control">
							<option value="Active">Active</option>
							<option value="Non Active">Non Active</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine location description</label>
					<div class="col-9">
						<textarea name="vaccine_location_description" placeholder="description" class="form-control"></textarea>
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-end">
				<button location="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button location="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>