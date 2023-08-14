<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Anggota</b></h4>
            </div>
            <div class="box-body">
                <a href="<?= site_url('laporan/cetak_laporan_keuangan') ?>" class="btn btn-success" style="margin-left: 15px"><i class="fa fa-print"></i> Cetak Laporan</a>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
                                <th>Tanggal, Bulan, Tahun</th>
								<th>Sumber Dana</th>
								<th>Uraian</th>
								<th>Nomor Bukti Kas</th>
								<th>Jumlah Penerimaa (Rp)</th>
								<th>No Urut Pengelaran</th>
								<th>Tanggal, Bulan, Tahun</th>
								<th>Sumber Dana</th>
								<th>Uraian</th>
								<th>Nomor Bukti Kas</th>
								<th>Jumlah Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_keuangan as $value) { ?>
                            <tr>
                                <td style="text-align:center"><?= $no++; ?></td>
								<td><?= $value->tanggal1 ?></td>
								<td><?= $value->sumber_dana1 ?></td>
								<td><?= $value->uraian1 ?></td>
								<td><?= $value->no_bukti_kas1 ?></td>
								<td><?= $value->jml_penerimaan ?></td>
								<td><?= $value->no_urut_pengeluaran ?></td>
								<td><?= $value->tanggal2 ?></td>
								<td><?= $value->sumber_dana2 ?></td>
								<td><?= $value->uraian2 ?></td>
								<td><?= $value->no_bukti_kas2 ?></td>
								<td><?= $value->jml_pengeluaran ?></td>
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
