<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Add New
	</button>
</p>
<?php 
echo form_open(base_url('admin/vaccine_type')); 
echo csrf_field(); 
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add new</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Vaccine Name</label>
					<div class="col-9">
						<input type="text" name="vaccine_type_name" class="form-control" placeholder="Vaccine name" value="<?php echo set_value('vaccine_type_name') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Origin</label>
					<div class="col-9">
						<input type="text" name="vaccine_type_origin" class="form-control" placeholder="Origin" value="<?php echo set_value('vaccine_type_origin') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine type status</label>
					<div class="col-9">
						<select name="vaccine_type_status" class="form-control">
							<option value="Active">Active</option>
							<option value="Non Active">Non Active</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Vaccine type description</label>
					<div class="col-9">
						<textarea name="vaccine_type_description" placeholder="description" class="form-control"></textarea>
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>