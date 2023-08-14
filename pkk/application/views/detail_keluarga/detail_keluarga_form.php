<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Anggota Keluarga</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">No Kk <?= form_error('no_kk') ?></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?= $no_kk; ?>" readonly/>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">NIK <?= form_error('nik') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $nik; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama <?= form_error('nama') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="enum">Status <?= form_error('status') ?></label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="status" value="Kawin" <?= $status == "Kawin" ? "checked" : ""; ?>>Kawin
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="status" value="Belum_Kawin" <?= $status == "Belum_Kawin" ? "checked" : ""; ?>>Belum Kawin
                                </label>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="enum">Jenis Kelamin <?= form_error('jenis_kelamin') ?></label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" <?= $jenis_kelamin == "L" ? "checked" : ""; ?>>Laki - Laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" <?= $jenis_kelamin == "P" ? "checked" : ""; ?>>Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Tempat Lahir <?= form_error('tempat_lahir') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tanggal Lahir" value="<?= $tempat_lahir; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Tanggal Lahir <?= form_error('tanggal_lahir') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" data-date-format='yyyy-mm-dd' value="<?= $tanggal_lahir; ?>" readonly />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Agama <?= form_error('agama') ?></label>
                            <div class="col-md-6">
                                <select name="agama" id="agama" class="form-control">
                                    <option value="Islam" <?= $agama == "Islam" ? "selected" : ""; ?>>Islam</option>
                                    <option value="Kristen" <?= $agama == "Kristen" ? "selected" : ""; ?>>Kristen</option>
                                    <option value="Katholik" <?= $agama == "Katholik" ? "selected" : ""; ?>>Katholik</option>
                                    <option value="Hindu" <?= $agama == "Hindu" ? "selected" : ""; ?>>Hindu</option>
                                    <option value="Budha" <?= $agama == "Budha" ? "selected" : ""; ?>>Budha</option>
                                    <option value="Konghucu" <?= $agama == "Konghucu" ? "selected" : ""; ?>>Konghucu</option>
                                    <option value="Kepercayaan" <?= $agama == "Kepercayaan" ? "selected" : ""; ?>>Kepercayaan</option>
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Pendidikan <?= form_error('pendidikan') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?= $pendidikan; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Pekerjaan <?= form_error('pekerjaan') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan; ?>" />
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Kedudukan <?= form_error('kedudukan') ?></label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="kedudukan" id="kedudukan" value="KepalaKK" <?= $kedudukan == "KepalaKK" ? "checked" : ""; ?>>Kepala Keluarga
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="kedudukan" id="kedudukan" value="AnggotaKK" <?= $kedudukan == "AnggotaKK" ? "checked" : ""; ?>>Anggota Keluarga
                                </label>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_detail_kk" value="<?= $id_detail_kk; ?>" />
                                <input type="hidden" name="nik_old" value="<?= $nik ?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('keluarga/read/'.$no_kk) ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>