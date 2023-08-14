<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Inventaris</b></h4>
			</div>
			<div class="box-body">
				<form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Nama Barang <?= form_error('nama_barang') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= $nama_barang; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">Asal Barang <?= form_error('asal_brg') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="asal_brg" id="asal_brg" placeholder="Asal Barang" value="<?= $asal_brg; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="datetime">Tanggal Penerimaan  / Pembelian <?= form_error('tanggal') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control datetimepicker"  name="tanggal" id="tanggal" placeholder="tanggal" value="<?= $tanggal; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="varchar">jumlah <?= form_error('jumlah') ?></label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah" value="<?= $jumlah; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="peyimpanan">Tempat penyimpanan <?= form_error('peyimpanan') ?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="peyimpanan" id="peyimpanan" placeholder="tempat peyimpanan" value="<?= $peyimpanan; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-2" for="kondisi">Kondisi <?= form_error('kondisi') ?></label>
							<div class="col-md-6">
								<select name="kondisi" id="kondisi" value="<?= $kondisi ?>" class="form-control">
								<option value="Rusak">Rusak</option>
								<option value="Bagus">Bagus</option>
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
								<input type="hidden" name="id_barang" value="<?= $id_barang; ?>" />
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
								<a href="<?= site_url('inventaris') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

