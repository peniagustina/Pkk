<div class="row">
    <div class="col-md-2">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title">
                    <h4><b><i class="fa fa-tasks"></i> Pilih Tanggal</b></h4>
                </div>
            </div>
            <div class="box-body">
                <form style="padding: 15px" action="<?= site_url('laporan/cari_laporan_event') ?>" method="POST">
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
                <h4><b><i class="fa fa-newspaper-o"></i> Data Event Tanggal <?= tgl_indo($this->session->userdata('tanggal_awal')) ?> - <?= tgl_indo($this->session->userdata('tanggal_akhir')) ?></b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px" action="<?= site_url('laporan/cetak_laporan_event') ?>" method="POST">
                    <input type="hidden" name="tanggal_awal" value="<?= $this->session->userdata('tanggal_awal'); ?>">
                    <input type="hidden" name="tanggal_akhir" value="<?= $this->session->userdata('tanggal_akhir'); ?>">
                    <button type="submit" class="btn btn-success"><i class="fa fa-file-o"></i> Cetak Laporan</button>
                </form>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
								<th>Nama Event</th>
								<th>Tanggal</th>
								<th>Tempat</th>
								<th style="text-align:center">Foto</th>
								<th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($event_data as $event) { ?>
                            <tr>
								<td style="text-align:center"><?= $no++; ?></td>
								<td><?= $event->nama_event ?></td>
								<td><?= $event->tanggal ?></td>
								<td><?= $event->tempat ?></td>
								<td style="text-align:center">
                                     <?php if (!empty($event->foto)) { ?>
                                        <a href="<?= base_url()?>uploads/event/<?=$event->foto ?>" data-toggle="lightbox" class="btn bg-purple"><i class="fa fa-image"></i></a>
                                    <?php } else { ?>
                                        No Photo
                                    <?php } ?>
                                </td>
								<td><?= $event->keterangan ?></td>
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
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>