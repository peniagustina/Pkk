<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Event</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('event/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
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
								<th width="15%" style="text-align:center">Aksi</th>
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
								<td style="text-align:center">
                                    <a href="<?= site_url('event/read/'.$event->id_event) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('event/update/'.$event->id_event) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('event/nonaktif/'.$event->id_event) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin nonaktifkan data ini ?')"><i class="fa fa-trash-o"></i></a>
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