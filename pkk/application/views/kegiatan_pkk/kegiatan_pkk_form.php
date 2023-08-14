<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Kegiatan PKK</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Kegiatan <?= form_error('nama_kegiatan') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan" value="<?= $nama_kegiatan; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Tempat Kegiatan <?= form_error('tempat_kegiatan') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tempat_kegiatan" id="tempat_kegiatan" placeholder="Tempat Kegiatan" value="<?= $tempat_kegiatan; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Tanggal Kegiatan <?= form_error('tanggal_kegiatan') ?></label>
                            <div class="col-md-2">
                                <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="tanggal_kegiatan" id="tanggal_kegiatan" placeholder="Tanggal Kegiatan" value="<?= $tanggal_kegiatan; ?>" readonly />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="keterangan">Keterangan <? form_error('keterangan')?></label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?= $keterangan; ?></textarea>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_kegiatan_pkk" value="<?= $id_kegiatan_pkk; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('kegiatan_pkk') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>