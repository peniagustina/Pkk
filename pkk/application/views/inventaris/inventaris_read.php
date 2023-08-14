<style>
	.badge-succes{
		background-color: #00a65a;
	}
	.badge-warning{
		background-color: yellow;
	}
</style>
<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Inventaris</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
						<tr>
							<td width="20%"><b>Nama Barang</b></td>
							<td><?= $nama_barang; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Asal Barang</b></td>
							<td><?= $asal_brg; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Penerimaan / Pembelian</b></td>
							<td><?= $tanggal; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jumlah</b></td>
							<td><?= $jumlah; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tempat peyimpanan</b></td>
							<td><?= $peyimpanan; ?></td>
						</tr>

						<tr>
							<td width="20%"><b>Kondisi</b></td>
							<td>
							<span class="badge <?php echo ($kondisi == 'Bagus') ? 'badge-succes' : 'badge-warning'; ?>"><?= $kondisi; ?></span>

							</td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('inventaris') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>

