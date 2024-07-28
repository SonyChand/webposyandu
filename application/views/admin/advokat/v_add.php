<div class="col-lg-12">
<a class="panel-primary">
	<div class="panel-heading">
		Add Data
	</div>
	<div class="panel-body">
<?php

	if (isset($error_upload)){
		echo '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>></button>'.$error_upload.'</div>';
	}

	echo form_open_multipart('advokat/add')
	?>

	<div class="form-group">
		<label>Nama Advokat</label>
		<input class="form-control" type="text" name="nama_advokat" required>
	</div>


	<div class="form-group">
		<label>Pendidikan</label>
		<select name="pendidikan" class="form-control">
			<option value="">--Pilih Pendidikan--</option>
			<option value="D3">D3</option>
			<option value="S1">S1</option>
			<option value="S2">S2</option>
			<option value="S3">S3</option>
			</select>
	</div>
	</div>
	
	<div class="col-md-12">
	<div class="form-group">
		<label>Jabatan</label>
		<input class="form-control" type="text" name="jabatan" required>
	</div>

	<div class="form-group">
		<label>Foto Advokat</label>
		<input type="file" class="form-control" type="text" name="Foto_advokat" required>
	</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button type="reset" class="btn btn-success">Reset</button>
	</div>
	
	<?php echo form_close()?>;
	</div>
</div>
</div>
