<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Inventaris</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('inventaris/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align:center">No</th>
								<th>Nama Barang</th>
								<th>Asal Barang</th>
								<th>Tanggal Penerimaan / Pembelian</th>
								<th>Jumlah</th>
								<th>Tempat Peyimpanan</th>
								<th>Kondisi</th>
								<th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($inventaris_data as $inventaris) { ?>
                            <tr>
								<td style="text-align:center"><?= $no++; ?></td>
								<td><?= $inventaris->nama_barang ?></td>
								<td><?= $inventaris->asal_brg ?></td>
								<td><?= $inventaris->tanggal ?></td>								
								<td><?= $inventaris->jumlah ?></td>
								<td><?= $inventaris->peyimpanan ?></td>
								<td><?= $inventaris->kondisi ?></td>
								<td><?= $inventaris->keterangan ?></td>

								<td style="text-align:center">
                                    <a href="<?= site_url('inventaris/read/'.$inventaris->id_barang) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('inventaris/update/'.$inventaris->id_barang) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('inventaris/delete/'.$inventaris->id_barang) ?>" title="Hapus Data" class="btn btn-danger"  onclick="javascript: return confirm('Apakah anda yakin ingin nonaktifkan data ini ?')"><i class="fa fa-trash-o"></i></a>
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
    $(document).on('click', '[data-toggle="lightbox"]', function(inventaris) {
        inventaris.prinventarisDefault();
        $(this).ekkoLightbox();
    });
</script>
