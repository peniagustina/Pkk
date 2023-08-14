<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Anggota</b></h4>
			</div>
			<div class="box-body">
				<form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">NIK <?= form_error('nik') ?></label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $nik; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Nama Anggota <?= form_error('nama_anggota') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota" value="<?= $nama_anggota; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Jabatan Anggota <?= form_error('jabatan_anggota') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="jabatan_anggota" id="jabatan_anggota" placeholder="Jabatan Anggota" value="<?= $jabatan_anggota; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
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
								<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $tempat_lahir; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Tanggal Lahir <?= form_error('tanggal_lahir') ?></label>
							<div class="col-md-2">
								<input type="text" class="form-control datepicker" data-date-format='yyyy-mm-dd' name="tanggal_lahir" id="id_anggota" placeholder="Masukan Tanggal Lahir" value="<?= $tanggal_lahir; ?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="enum">Status Pernikahan <?php echo form_error('status') ?></label>
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
							<label class="col-md-2" for="alamat">Alamat <? form_error('alamat')?></label>
							<div class="col-md-6">
								<textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?= $alamat; ?></textarea>
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
							<label class="col-md-2" for="keterangan">Keterangan <? form_error('keterangan')?></label>
							<div class="col-md-6">
								<textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?= $keterangan; ?></textarea>
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
							<div class="col-md-6 col-md-offset-2">
								<input type="hidden" name="id_anggota" value="<?= $id_anggota; ?>" />
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
								<a href="<?= site_url('anggota') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>