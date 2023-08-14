<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Pengguna</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('pengguna/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
								<th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
								<th>Username</th>
								<th>Hak Akses</th>
								<th width="15%" style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($pengguna_data as $pengguna) { ?>
                            <tr>
								<td style="text-align:center"><?= $no++; ?></td>
								<td><?= $pengguna->nik ?></td>
                                <td><?= $pengguna->nama_anggota ?></td>
                                <td><?= $pengguna->jabatan_anggota ?></td>
								<td><?= $pengguna->username ?></td>
								<td><?= $pengguna->hak_akses ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('pengguna/update/'.$pengguna->id_pengguna) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('pengguna/nonaktif/'.$pengguna->id_pengguna) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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