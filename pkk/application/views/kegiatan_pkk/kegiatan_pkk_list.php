<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Kegiatan PKK</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('kegiatan_pkk/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
								<th>Nama Kegiatan</th>
								<th>Tempat Kegiatan</th>
								<th>Tanggal Kegiatan</th>
								<th>Keterangan</th>
								<th width="15%" style="text-align:center">Aksi</th>
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
                                    <a href="<?= site_url('kegiatan_pkk/read/'.$kegiatan_pkk->id_kegiatan_pkk) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i> Lihat Peserta</a>
                                    <a href="<?= site_url('kegiatan_pkk/update/'.$kegiatan_pkk->id_kegiatan_pkk) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('kegiatan_pkk/delete/'.$kegiatan_pkk->id_kegiatan_pkk) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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
</script>