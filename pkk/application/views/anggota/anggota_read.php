<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Anggota</b></h4>
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
							<td width="20%"><b>Jabatan Anggota</b></td>
							<td><?= $jabatan_anggota; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jenis Kelamin</b></td>
							<td><?= $jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tempat Lahir</b></td>
							<td><?= $tempat_lahir; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Lahir</b></td>
							<td><?= tgl_indo($tanggal_lahir); ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Status</b></td>
							<td><?= $status == "Kawin" ? "Kawin" : "Belum Kawin"; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Alamat</b></td>
							<td><?= $alamat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Pendidikan</b></td>
							<td><?= $pendidikan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Pekerjaan</b></td>
							<td><?= $pekerjaan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Wilayah</b></td>
							<td><?= $nama_wilayah; ?></td>
						</tr>
						<div class="form-group">
				</div>
					</table>
					<a href="<?= site_url('anggota') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>