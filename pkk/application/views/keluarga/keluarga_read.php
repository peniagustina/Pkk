<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-eye"></i> Detail Data Keluarga</b></h4>
            </div>
            <div class="box-body">
                <div style="padding: 15px;">
                    <table class="table table-striped">
                        <tr>
                            <td width="20%"><b>Nomor Kartu Keluarga</b></td>
                            <td><?= $no_kk; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Keterangan</b></td>
                            <td><?= $keterangan; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Wilayah</b></td>
                            <td><?= $nama_wilayah; ?></td>
                        </tr>
                    </table>
                    <a href="<?= site_url('keluarga') ?>" class="btn btn-danger pull-right">
                        <i class="fa fa-sign-out"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-users"></i> Data Anggota Keluarga</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <a href="<?= site_url('detail_keluarga/create/'.$no_kk) ?>" class="btn btn-primary" style="margin-left: 15px"><i class="fa fa-plus"></i> Tambah Data</a>
                    
                    <div class="table-responsive" style="padding: 15px">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align:center">No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Kedudukan</th>
                                    <th width="7%" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail_kk as $value) { ?>
                                    <tr>
                                        <td style="text-align:center"><?= $no++; ?></td>
                                        <td><?= $value->nik ?></td>
                                        <td><?= $value->nama ?></td>
                                        <td><?= $value->status == "Kawin" ? "Kawin" : "Belum Kawin"; ?></td>
                                        <td><?= $value->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
                                        <td><?= $value->tempat_lahir ?></td>
                                        <td><?= $value->tanggal_lahir ?></td>
                                        <td><?= $value->agama ?></td>
                                        <td><?= $value->pendidikan ?></td>
                                        <td><?= $value->pekerjaan ?></td>
                                        <td><?= $value->kedudukan == "KepalaKK" ? "Kepala Keluarga" : "Anggota Keluarga"; ?></td>
                                        <td style="text-align:center">
                                            <a href="<?= site_url('detail_keluarga/update/'.$value->id_detail_kk) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?= site_url('detail_keluarga/nonaktif/'.$value->id_detail_kk) ?>" title="Non Aktifkan" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
</div>

<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mytable').DataTable({
            responsive: true
        });
    });
</script>