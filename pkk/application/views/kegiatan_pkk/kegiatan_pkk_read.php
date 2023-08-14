<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Kegiatan PKK</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
						<tr>
							<td width="20%"><b>Nama Kegiatan</b></td>
							<td><?= $nama_kegiatan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tempat Kegiatan</b></td>
							<td><?= $tempat_kegiatan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Kegiatan</b></td>
							<td><?= tgl_indo($tanggal_kegiatan); ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('kegiatan_pkk') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Daftar Peserta Kegiatan</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding-left: 15px; padding-bottom: 15px;">
                    <a href="<?= site_url('kegiatan_pkk/create_peserta/'.$id_kegiatan_pkk) ?>" class="btn btn-primary" style="margin-left: 15px"><i class="fa fa-plus"></i> Tambah Data</a>
                    <div class="table-responsive" style="padding: 15px">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align:center">No</th>
                                    <th>No KK</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th width="7%" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_kegiatan_keluarga as $value) { ?>
                                    <tr>
                                        <td style="text-align:center"><?= $no++; ?></td>
                                        <td><?= $value->no_kk ?></td>
                                        <td><?= $value->nik ?></td>
                                        <td><?= $value->nama ?></td>
                                        <td><?= $value->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
                                        <td><?= $value->tempat_lahir ?></td>
                                        <td><?= tgl_indo($value->tanggal_lahir) ?></td>
                                        <td><?= $value->pekerjaan ?></td>
                                        <td style="text-align:center">
                                            <a href="<?= site_url('kegiatan_pkk/update_peserta/'.$value->id_kegiatan_keluarga) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?= site_url('kegiatan_pkk/delete_peserta/'.$value->id_kegiatan_keluarga) ?>" title="Non Aktifkan" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
       		</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mytable').DataTable({
            responsive: true
        });
    });
</script>