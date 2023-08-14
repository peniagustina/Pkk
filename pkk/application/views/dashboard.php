<!-- Small boxes (Stat box) -->
<div class="row" style="margin-bottom: 10px; padding-top: 10px">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?= $count_keluarga ?></h3>
				<p>Keluarga</p>
			</div>
			<div class="icon">
				<i class="fa fa-book"></i>
			</div>
			<a href="<?=site_url('keluarga')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?= $count_kader ?></h3>

				<p>Kader</p>
			</div>
			<div class="icon">
				<i class="fa fa-book"></i>
			</div>
			<a href="<?=site_url('kader')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?= $count_anggota_pkk?></h3>

				<p>Anggota Tim Penggerak PKK</p>
			</div>
			<div class="icon">
				<i class="fa fa-book"></i>
			</div>
			<a href="<?=site_url('anggota')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?= $count_kegiatan_pkk ?></h3>

				<p>Kegiatan PKK</p>
			</div>
			<div class="icon">
				<i class="fa fa-book"></i>
			</div>
			<a href="<?=site_url('kegiatan_pkk')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/calendar/fullcalendar.min.css" />

<div class="row">
	<div class="col-md-9">
		<div class="box box-default box-solid">
			<div class="box-header">
				<h4 style="padding-left: 15px"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;<b> Jadwal Acara PKK</b></h4>
			</div>
			<div class="box-body">
				<div class="table-responsive">

					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-12">
		<div class="row-fluid">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3><?= $count_pengguna ?></h3>

					<p>Total Pengguna</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="<?=site_url('pengguna')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="row-fluid">
			<div class="small-box bg-blue">
				<div class="inner">
					<h3><?= $count_wilayah ?></h3>

					<p>Wilayah</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="<?=site_url('wilayah')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-purple">
				<h4 class="modal-title" id="myModalLabel">Detail</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open(site_url(""), array("class" => "form-horizontal","method"=>"POST")) ?>

				<div class="form-group">
					<label for="p-in" class="col-md-4 label-heading">Nama Acara</label>
					<div class="col-md-8">
						<input readonly type="text" class="form-control" name="nama_event" id="nama_event">
					</div>
				</div>


				<div class="form-group">
					<label for="p-in" class="col-md-4 label-heading">Tempat</label>
					<div class="col-md-8">
						<input readonly type="text" class="form-control" name="tempat" id="tempat">
					</div>
				</div>

				<div class="form-group">
					<label for="p-in" class="col-md-4 label-heading">Tanggal</label>
					<div class="col-md-8">
						<input readonly type="text" class="form-control" name="start_date" id="start_date">
					</div>
				</div>

				<div class="form-group">
					<label for="p-in" class="col-md-4 label-heading">Keterangan</label>
					<div class="col-md-8 ui-front">
						<input readonly type="text" class="form-control" name="keterangan" id="keterangan">
					</div>
				</div>
				<input type="hidden" name="eventid" id="event_id" value="0" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url() ?>assets/calendar/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/calendar/gcal.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({

		});
	});
	var date_last_clicked = null;

	$('#calendar').fullCalendar({
		eventSources: [
		{
			events: function(start, end, timezone, callback) {
				$.ajax({
					url: '<?php echo base_url() ?>index.php/dashboard/get_events',
					dataType: 'json',
					data: {                
						start: start.unix(),
						end: end.unix()
					},
					success: function(msg) {
						var events = msg.events;
						callback(events);
					}
				});
			}
		},
		],

		eventClick: function(event, jsEvent, view) {
			$('#name').val(event.title);
			$('#tempat').val(event.tempat);
			$('#keterangan').val(event.keterangan);
			$('#nama_event').val(event.nama_event);
			$('#start_date').val(moment(event.start).format('DD MMMM YYYY HH:mm'));
			if(event.end) {
				$('#end_date').val(moment(event.end).format('DD MMMM YYYY HH:mm'));
			} else {
				$('#end_date').val(moment(event.start).format('DD MMMM YYYY HH:mm'));
			}
			$('#event_id').val(event.id);
			$('#editModal').modal();
		},


	});
</script>


