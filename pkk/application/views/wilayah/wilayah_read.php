<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Wilayah</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
						<tr>
							<td width="20%"><b>Nama Wilayah</b></td>
							<td><?= $nama_wilayah; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Alamat Wilayah</b></td>
							<td><?= $alamat_wilayah; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('wilayah') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>