<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Keluarga</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('keluarga/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nomor KK</th>
                                <th>Nama Wilayah</th>
								<th>Keterangan</th>
								<th width="15%" style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($keluarga_data as $value) { ?>
                            <tr>
								<td><?= $no++; ?></td>
                                <td><?= $value->no_kk ?></td>
                                <td><?= $value->nama_wilayah ?></td>
								<td><?= $value->keterangan ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('keluarga/read/'.$value->no_kk) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('keluarga/update/'.$value->no_kk) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('keluarga/nonaktif/'.$value->no_kk) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin nonaktifkan data ini ?')"><i class="fa fa-trash-o"></i></a>
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