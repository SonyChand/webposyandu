<div class="col-lg-12">
<a class="panel-primary">
	<div class="panel-heading">
	<a href="<?= base_url('advokat/add') ?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i>Add</a>
	</div>
	<div class="panel-body">
<?php

	if ($this->session->flashdata('pesan')){
		echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo $this->session->flashdata('pesan');
		echo '</div>';
	}
	?>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Advokat</th>
			<th>Pendidikan</th>
			<th>Jabatan</th>
			<th>Foto</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($advokat as $key => $value) {?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $value->nama_advokat ?></td>
		<td><?= $value->pendidikan?></td>
		<td><?= $value->jabatan?></td>
		<td><?= $value->Foto_advokat?></td>

		<td>
			<a href="<?= base_url('advokat/edit/'.$value->id_advokat) ?>"class="btn btn-success"><i class="fa fa-pencil">  Edit</i></a>
			<a href="<?= base_url('advokat/delete/'.$value->id_advokat) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash">  Deleted</i></a>
	</td>
	</tr>

	<?php } ?>
	</tbody>
</table>
	</div>
</div>
</div>
