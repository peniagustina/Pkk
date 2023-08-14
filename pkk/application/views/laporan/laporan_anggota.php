<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Anggota</b></h4>
            </div>
            <div class="box-body">
                <a href="<?= site_url('laporan/cetak_laporan_anggota') ?>" class="btn btn-success" style="margin-left: 15px"><i class="fa fa-print"></i> Cetak Laporan</a>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
                                <th>NIK</th>
                                <th>Nama Anggota</th>
                                <th>Jabatan Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Alamat</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Keterangan</th>
                                <th>Nama Wilayah</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($anggota_data as $value) { ?>
                            <tr>
                                <td style="text-align:center"><?= $no++; ?></td>
                                <td><?= $value->nik; ?></td>
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->jabatan_anggota; ?></td>
                                <td><?= $value->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
                                <td><?= $value->tempat_lahir ?></td>
                                <td><?= tgl_indo($value->tanggal_lahir) ?></td>
                                <td><?= $value->status == "Kawin" ? "Kawin" : "Belum Kawin"; ?></td>
                                <td><?= $value->alamat; ?></td>
                                <td><?= $value->pendidikan ?></td>
                                <td><?= $value->pekerjaan ?></td>
                                <td><?= $value->keterangan ?></th>
                                    <td><?= $value->nama_wilayah; ?></td>
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