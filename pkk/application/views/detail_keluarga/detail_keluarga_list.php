<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Detail_keluarga</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('detail_keluarga/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
								<th>No Kk</th>
								<th>Nik</th>
								<th>Nama</th>
								<th>Status</th>
								<th>Jenis Kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Pendidikan</th>
								<th>Pekerjaan</th>
								<th>Kedudukan</th>
								<th>Status Keluarga</th>
								<th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($detail_keluarga_data as $detail_keluarga) { ?>
                            <tr>
								<td><?= $no++; ?></td>
								<td><?= $detail_keluarga->no_kk ?></td>
								<td><?= $detail_keluarga->nik ?></td>
								<td><?= $detail_keluarga->nama ?></td>
								<td><?= $detail_keluarga->status ?></td>
								<td><?= $detail_keluarga->jenis_kelamin ?></td>
								<td><?= $detail_keluarga->tempat_lahir ?></td>
								<td><?= $detail_keluarga->tanggal_lahir ?></td>
								<td><?= $detail_keluarga->agama ?></td>
								<td><?= $detail_keluarga->pendidikan ?></td>
								<td><?= $detail_keluarga->pekerjaan ?></td>
								<td><?= $detail_keluarga->kedudukan ?></td>
								<td><?= $detail_keluarga->status_keluarga ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('detail_keluarga/read/'.$detail_keluarga->id_detail_kk) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('detail_keluarga/update/'.$detail_keluarga->id_detail_kk) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('detail_keluarga/delete/'.$detail_keluarga->id_detail_kk) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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