<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-tasks"></i> <?= $button ?> Peserta Kegiatan <?= $nama_kegiatan ?></b></h4>
			</div>
			<div class="box-body">
				<form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="int">Nama Kegiatan PKK <?= form_error('id_kegiatan_pkk') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan PKK" value="<?= $nama_kegiatan; ?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Tempat Kegiatan <?= form_error('tempat_kegiatan') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="tempat_kegiatan" id="tempat_kegiatan" placeholder="Tempat Kegiatan" value="<?= $tempat_kegiatan; ?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="date">Tanggal Kegiatan <?= form_error('tanggal_kegiatan') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan" placeholder="Tanggal Kegiatan" value="<?= $tanggal_kegiatan; ?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="keterangan">Keterangan <? form_error('keterangan')?></label>
							<div class="col-md-6">
								<textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" readonly><?= $keterangan; ?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="int">Nama Peserta <?= form_error('id_detail_kk') ?></label>
							<div class="col-md-6">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Peserta" value="<?= $nama ?>" required/>
                                <input type="hidden" name="id_detail_kk" id="id_detail_kk" value="<?= $id_detail_kk; ?>" />
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Cari</button>
                            </div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6 col-md-offset-2">
								<input type="hidden" name="id_kegiatan_pkk" value="<?= $id_kegiatan_pkk; ?>" />
								<input type="hidden" name="id_kegiatan_keluarga" value="<?= $id_kegiatan_keluarga ?>">
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
								<a href="<?= site_url('kegiatan_pkk/read/'.$id_kegiatan_pkk) ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih Data Anggota</h4>
            </div>
            <div class="modal-body">
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
                                <th width="5%" style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail_kk as $value) { ?>
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
                                        <button type="button" class="btn btn-success" data-dismiss="modal" data-id_detail_kk="<?= $value->id_detail_kk ?>" data-nama="<?= $value->nama ?>" onclick="getData(this)"><i class="fa fa-plus"></i></button>
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
<!-- END MODAL -->

<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mytable').DataTable({
            responsive: true,
            "autoWidth" : false,
        });
    });

    function getData(detail_kk) {
        const id_detail_kk = detail_kk.getAttribute("data-id_detail_kk");
        const nama = detail_kk.getAttribute("data-nama");
        document.getElementById("id_detail_kk").value = id_detail_kk;
        document.getElementById("nama").value = nama;
    }
</script>