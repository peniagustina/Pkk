<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Pengguna</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
						<tr>
							<td width="20%"><b>Id Anggota</b></td>
							<td><?= $id_anggota; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Username</b></td>
							<td><?= $username; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Password</b></td>
							<td><?= $password; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Hak Akses</b></td>
							<td><?= $hak_akses; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Status Pengguna</b></td>
							<td><?= $status_pengguna; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('pengguna') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>