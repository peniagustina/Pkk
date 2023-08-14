<div class="row">
    <div class="col-md-2">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title">
                    <h4><b><i class="fa fa-tasks"></i> Pilih Tanggal</b></h4>
                </div>
            </div>
            <div class="box-body">
                <form style="padding: 15px" action="<?= site_url('laporan/cari_laporan_kegiatan_pkk') ?>" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Awal" value="<?= $this->session->userdata('tanggal_awal'); ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Akhir" value="<?= $this->session->userdata('tanggal_akhir'); ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Kegiatan PKK Tanggal <?= tgl_indo($this->session->userdata('tanggal_awal')) ?> - <?= tgl_indo($this->session->userdata('tanggal_akhir')) ?></b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px" action="<?= site_url('laporan/cetak_laporan_kegiatan_pkk') ?>" method="POST">
                    <input type="hidden" name="tanggal_awal" value="<?= $this->session->userdata('tanggal_awal'); ?>">
                    <input type="hidden" name="tanggal_akhir" value="<?= $this->session->userdata('tanggal_akhir'); ?>">
                    <button type="submit" class="btn btn-success"><i class="fa fa-file-o"></i> Cetak Laporan</button>
                </form>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
								<th>Nama Kegiatan</th>
								<th>Tempat Kegiatan</th>
								<th>Tanggal Kegiatan</th>
								<th>Keterangan</th>
								<th width="15%" style="text-align:center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($kegiatan_pkk_data as $kegiatan_pkk) { ?>
                            <tr>
								<td style="text-align:center"><?= $no++; ?></td>
								<td><?= $kegiatan_pkk->nama_kegiatan ?></td>
								<td><?= $kegiatan_pkk->tempat_kegiatan ?></td>
								<td><?= tgl_indo($kegiatan_pkk->tanggal_kegiatan) ?></td>
								<td><?= $kegiatan_pkk->keterangan ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('laporan/detail_kegiatan_pkk/'.$kegiatan_pkk->id_kegiatan_pkk) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i> Lihat Peserta</a>
                            </tr>
						<?php } ?>
                        </tbody>
                    </table>
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