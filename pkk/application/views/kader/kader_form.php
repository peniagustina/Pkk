<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Kader</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nama Anggota <?= form_error('id_anggota') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Angota" value="<?= $nama_anggota ?>" readonly/>
                                <input type="hidden" class="form-control" name="id_anggota" id="id_anggota" value="<?= $id_anggota; ?>" />
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Jabatan Kader <?= form_error('jabatan_kader') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="jabatan_kader" id="jabatan_kader" placeholder="Jabatan Kader" value="<?= $jabatan_kader; ?>" />
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
                                <input type="hidden" name="id_kader" value="<?= $id_kader; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('kader') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih Data Anggota</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
                                <th>NIK</th>
                                <th>Nama Anggota</th>
                                <th>Jabatan Anggota</th>
                                <th>Alamat</th>
                                <th>Wilayah</th>
                                <th width="5%" style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data_anggota as $anggota) { ?>
                                <tr>
                                    <td style="text-align:center"><?= $no++; ?></td>
                                    <td><?= $anggota->nik ?></td>
                                    <td><?= $anggota->nama_anggota ?></td>
                                    <td><?= $anggota->jabatan_anggota ?></td>
                                    <td><?= $anggota->alamat ?></td>
                                    <td><?= $anggota->nama_wilayah ?></td>
                                    <td style="text-align:center">
                                        <button type="button" class="btn btn-success" data-dismiss="modal" data-id_anggota="<?= $anggota->id_anggota ?>" data-nama_anggota="<?= $anggota->nama_anggota ?>" onclick="getData(this)"><i class="fa fa-plus"></i></button>
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
<!-- END MODAL -->

<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mytable').DataTable({
            responsive: true,
            "autoWidth" : false,
        });
    });

    function getData(anggota) {
        const id_anggota = anggota.getAttribute("data-id_anggota");
        const nama_anggota = anggota.getAttribute("data-nama_anggota");
        document.getElementById("id_anggota").value = id_anggota;
        document.getElementById("nama_anggota").value = nama_anggota;
    }
</script>