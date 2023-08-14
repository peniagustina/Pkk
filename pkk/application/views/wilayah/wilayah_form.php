<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Wilayah</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Wilayah <?= form_error('nama_wilayah') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_wilayah" id="nama_wilayah" placeholder="Nama Wilayah" value="<?= $nama_wilayah; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Alamat Wilayah <?= form_error('alamat_wilayah') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat_wilayah" id="alamat_wilayah" placeholder="Alamat Wilayah" value="<?= $alamat_wilayah; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_wilayah" value="<?= $id_wilayah; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('wilayah') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>