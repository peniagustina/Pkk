<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Kader</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
        				<tr>
							<td width="20%"><b>NIK</b></td>
							<td><?= $nik; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Anggota</b></td>
							<td><?= $nama_anggota; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jabatan Kader</b></td>
							<td><?= $jabatan_kader; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('kader') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>