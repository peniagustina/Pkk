<div class="row">
	<div class="col-md-12">
   		<div class="box box-success box-solid">
    		<div class="box-header">
    			<h4><b><i class="fa fa-eye"></i> Detail Data Event</b></h4>
    		</div>
    		<div class="box-body">
    			<div style="padding: 15px;">
        			<table class="table table-striped">
						<tr>
							<td width="20%"><b>Nama Event</b></td>
							<td><?= $nama_event; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal</b></td>
							<td><?= $tanggal; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tempat</b></td>
							<td><?= $tempat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Foto</b></td>
							<td>
								<?php if (!empty($foto)) { ?>
                                    <a href="<?= base_url()?>uploads/event/<?=$foto ?>" data-toggle="lightbox" class="btn bg-purple"><i class="fa fa-image"></i> Lihat Foto</a>
                                <?php } else { ?>
                                    No Photo
                                <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('event') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
       		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>