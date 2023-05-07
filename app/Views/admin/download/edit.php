<form action="<?php echo base_url('admin/download/edit/'.$download->id_download) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-3">Judul Download</label>
	<div class="col-md-9">
		<input type="text" name="judul_download" class="form-control" value="<?php echo $download->judul_download ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Upload File</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" value="<?php echo $download->gambar ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Kategori, Jenis &amp; Status</label>
	<div class="col-md-5">
		<select name="id_kategori_download" class="form-control">
			<?php foreach($kategori_download as $kategori_download) { ?>
			<option value="<?php echo $kategori_download->id_kategori_download ?>" <?php if($download->id_kategori_download==$kategori_download->id_kategori_download) { echo 'selected'; } ?>>
				<?php echo $kategori_download->nama_kategori_download ?>
			</option>
			<?php } ?>
		</select>
		<small class="text-secondary">Kategori</small>
	</div>
	<div class="col-md-4">
		<select name="jenis_download" class="form-control">
			<option value="Download">Download</option>
			<option value="Panduan" <?php if($download->jenis_download=="Panduan") { echo 'selected'; } ?>>Panduan</option>
		</select>
		<small class="text-secondary">Jenis konten</small>
	</div>
	
</div>

<div class="form-group row">
	<label class="col-md-3">Isi Download</label>
	<div class="col-md-9">
		<textarea name="isi" class="form-control konten"><?php echo $download->isi ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Link/URL</label>
	<div class="col-md-9">
		<input type="text" name="website" class="form-control" value="<?php echo $download->website ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<a href="<?php echo base_url('admin/download') ?>" class="btn btn-outline-info">
			<i class="fa fa-arrow-left"></i> Kembali
		</a>
		<button type="reset" class="btn btn-secondary"><i class="fa fa-times"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>