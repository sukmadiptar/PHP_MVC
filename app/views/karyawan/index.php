<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash();?>
		</div>
	</div>
	
<div class="row mb-3">
	<div class="col-lg-6">
		<button type="button" class="btn btn-primary addData" data-toggle="modal" data-target="#formModal">
			Add Data Karyawan
		</button>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-6">
		<form action="<?= BASEURL;?>/karyawan/search" method="post">
		
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search here!" name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="btnSearch">Button
						</button>
					</div>
			</div>
		</form>
	</div>
</div>

	<div class="row">
		<div class="col-6">
		
			<h3>Daftar Karyawan</h3>
			<ul class="list-group">
			<?php foreach ( $data['kar'] as $kar): ?>
  				<li class="list-group-item">
  				<?= $kar['nama']; ?>
  				
					<a href="<?= BASEURL; ?>/karyawan/delete/ <?= $kar['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Are you sure?');">delete</a>
  				
					<a href="<?= BASEURL; ?>/karyawan/edit/<?= $kar['id']; ?>" class="badge badge-success float-right ml-1 viewModalEdit" data-toggle="modal" data-target="#formModal" 
					data-id="<?= $kar['id']; ?>">edit</a>

					<a href="<?= BASEURL; ?>/karyawan/detail/<?= $kar['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
  				</li>
			<?php endforeach; ?>
  			</ul>
		</div>
	</div>

</div>
<!-- MODAL -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Add Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/karyawan/add" method="post">
				<input type="hidden" name="id" id="id">
			<div class="form-group">
				<label for="nama">Name</label>
				<input type="text" class="form-control" id="nama" name="nama">
			</div>

			<div class="form-group">
				<label for="nik">NIK</label>
				<input type="number" class="form-control" id="nik" name="nik">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>

			<div class="form-group">
				<label for="jobdesk">Jobdesk</label>
				<select class="form-control" id="jobdesk" name="jobdesk">
				<option value="Berdendang">Berdendang</option>
				<option value="Berenang">Berenang</option>
				<option value="Berlari">Berlari</option>
				<option value="Berdagang">Berdagang</option>
				<option value="Bernaung">Bernaung</option>
				<option value="Bersembunyi">Bersembunyi</option>
				</select>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Data</button>
		</form>
      </div>
    </div>
  </div>
</div>