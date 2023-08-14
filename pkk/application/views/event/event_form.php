<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Event</b></h4>
			</div>
			<div class="box-body">
				<form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Nama Event <?= form_error('nama_event') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Nama Event" value="<?= $nama_event; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="datetime">Tanggal <?= form_error('tanggal') ?></label>
							<div class="col-md-6">
								<input type="text" readonly class="form-control datetimepicker"  name="tanggal" id="tanggal" placeholder="tanggal" value="<?= $tanggal; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Tempat <?= form_error('tempat') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?= $tempat; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Foto <?= form_error('foto') ?></label>
							<div class="col-md-6">
								<?php if(!empty($foto)) {?>
                                    <input type="file" id="foto" name="foto" class="file-input" accept="image/*" data-initial-preview="<img src=<?= base_url();?>uploads/event/<?= $foto;?> class=file-preview-image />" data-show-remove="true">
                                <?php } else if(empty($foto)){ ?>
                                    <input type="file" id="foto" name="foto" class="file-input" accept="image/*">
                                <?php } ?>
                                <label class="error" for="foto">
                                    <code>( ext: .jpg</code> <code>.jpeg</code> <code>.png</code> <code>&amp; Max. 3MB )</code>
                                </label>
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
								<input type="hidden" name="id_event" value="<?= $id_event; ?>" />
								<input type="hidden" name="foto_old" value="<?= $foto ?>">
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
								<a href="<?= site_url('event') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

