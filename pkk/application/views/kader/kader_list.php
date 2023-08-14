<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Kader</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('kader/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
                                <th>NIK</th>
								<th>Nama Anggota</th>
								<th>Jabatan Kader</th>
								<th>Keterangan</th>
								<th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($kader_data as $kader) { ?>
                            <tr>
								<td style="text-align:center"><?= $no++; ?></td>
                                <td><?= $kader->nik ?></td>
								<td><?= $kader->nama_anggota ?></td>
								<td><?= $kader->jabatan_kader ?></td>
								<td><?= $kader->keterangan ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('kader/read/'.$kader->id_kader) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('kader/update/'.$kader->id_kader) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('kader/nonaktif/'.$kader->id_kader) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin nonaktifkan data ini ?')"><i class="fa fa-trash-o"></i></a>
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