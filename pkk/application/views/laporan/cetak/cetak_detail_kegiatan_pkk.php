<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Laporan</title>
	<link rel="stylesheet" href="">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/logopkk.png') ?>">
	<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0; width: 100%}
		.tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:center;text-align:center;}
		.tg .tg-baqh{text-align:center;vertical-align:top}
		.tg .tg-0lax{text-align:left;vertical-align:top}
		.column {
			float: left;
			width: 45%;
			padding: 5px;
		}
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
		.mockup{position: relative;width: 75%;height: auto;justify-content: center;text-align: center;align-items: top;font-family:Arial, sans-serif;font-size:20px;margin: 0 auto 20px;}
		.mockup .text-mockup{line-height: 0;}
		.logo_cetak{left: 0px;top: 0;position: absolute;float: inline-start;width: 80px;}
		@media print{@page {size: landscape;}}
	</style>
</head>
<body onload="setTimeout(cetak,1000)">
<div class="mockup">
		<img src="<?php echo base_url('assets/images/logopkk.png') ?>" alt="" srcset="" class="logo_cetak">
		<div class="text-mockup">
			<h4>LAPORAN DATA KEGIATAN PKK</h4>
			<h4>PKK DESA BUNTON</h6>
			<p style="font-size: 15px;">Sekretariat:JL.Laut No 2,Karangsari,Bunton,Adipala,
			 Cilacap,Jawa Tengah (53271)</p>
		</div>
		<hr style="border: 1px solid black; margin-top: 42px;">
	</div>
	<div style="text-align: center;font-family:Arial, sans-serif;font-size:20px;">
		<h4><?= $nama_kegiatan ?></h4>
	</div>
	<table>
		<tr>
			<td>Tempat Kegiatan</td>
			<td>: <?= $tempat_kegiatan ?></td>
		</tr>
		<tr>
			<td>Tanggal Kegiatan</td>
			<td>: <?= tgl_indo($tanggal_kegiatan) ?></td>
		</tr>
		<tr>
			<td>Peserta</td>
			<td>:</td>
		</tr>
	</table>

	<table class="tg" >
	  	<tr>
		    <th class="tg-1wig">No.</th>
		    <th class="tg-1wig">No KK</th>
            <th class="tg-1wig">NIK</th>
            <th class="tg-1wig">Nama</th>
            <th class="tg-1wig">Jenis Kelamin</th>
            <th class="tg-1wig">Tempat Lahir</th>
            <th class="tg-1wig">Tanggal Lahir</th>
            <th class="tg-1wig">Pekerjaan</th>
	  	</tr>
	  	<?php
	        $no = 1;
	        foreach ($data_kegiatan_keluarga as $value) { ?>
	  	<tr>
		    <td class="tg-baqh"><?= $no++; ?></td>
		    <td class="tg-0lax"><?= $value->no_kk ?></td>
            <td class="tg-0lax"><?= $value->nik ?></td>
            <td class="tg-0lax"><?= $value->nama ?></td>
            <td class="tg-0lax"><?= $value->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
            <td class="tg-0lax"><?= $value->tempat_lahir ?></td>
            <td class="tg-0lax"><?= tgl_indo($value->tanggal_lahir) ?></td>
            <td class="tg-0lax"><?= $value->pekerjaan ?></td>
	  	</tr>
	  	<?php } ?>
	</table>
	<h5 style="float: right; margin-right: 20px; width: 130px; text-align: start; font-size: 12px;">
	Bunton, <?php echo format_indo(date('Y-m-d'));?>
	<p style="text-align: center; font-size: 12px;" class="text-center">Mengetahui / Menyetujui</p>
		<p style="padding: 15px"></p>
		<hr style="margin: 0; border: 0.1px solid black;">
		<p style="margin-top: 4px;">( ...................................... )</p>
	</h5>
</body>
<script type="text/javascript">
    function cetak(){
        print();
    }
</script>
<meta http-equiv="refresh" content="1; <?= $_SERVER['HTTP_REFERER'];?>">
</html>
