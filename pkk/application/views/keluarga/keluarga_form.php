<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Keluarga</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nomor Kartu keluarga <?= form_error('no_kk') ?></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= $no_kk; ?>" <?= $button == "Ubah" ? "readonly" : ""; ?>/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nama Wilayah <?= form_error('id_wilayah') ?></label>
                            <div class="col-md-6">
                                <select name="id_wilayah" id="id_wilayah" class="form-control select2" data-placeholder="Pilih Wilayah">
                                    <?php if (!$id_wilayah) {
                                        echo "<option value=''></option>"; 
                                    }
                                    ?>
                                    <?php foreach ($wilayah as $value) {
                                        if ($value->id_wilayah==$id_wilayah) {
                                            $selected="selected";
                                        } else {
                                            $selected="";
                                        }
                                        echo "<option value='$value->id_wilayah' $selected > $value->nama_wilayah</option>";
                                    } ?>
                                </select>
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
                                <input type="hidden" name="no_kk_old" value="<?= $no_kk ?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('keluarga') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
