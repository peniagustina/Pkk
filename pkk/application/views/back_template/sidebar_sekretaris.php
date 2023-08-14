<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $icon; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $nama_user ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="<?php echo ($this->uri->segment(1) == 'dashboard' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'wilayah') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-briefcase"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'wilayah') ? 'active' : ''; ?>"><a href="<?php echo site_url('wilayah') ?>"><i class="fa fa-circle-o "></i> Data Wilayah</a></li>
                </ul>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'kader' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('kader') ?>">
                    <i class="fa fa-book"></i> <span>Kader</span>
                </a>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'event' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('event') ?>">
                    <i class="fa fa-book"></i> <span>Event</span>
                </a>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'pengguna' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('pengguna') ?>">
                    <i class="fa fa-book"></i> <span>Data Pengguna</span>
                </a>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'inventaris' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('inventaris') ?>">
                    <i class="fa fa-book"></i> <span>Inventaris</span>
                </a>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(2) == 'anggota' || $this->uri->segment(2) == 'keluarga' || $this->uri->segment(2) == 'kegiatan_pkk' || $this->uri->segment(2) == 'kader' || $this->uri->segment(2) == 'event' || $this->uri->segment(2) == 'pengguna' || $this->uri->segment(2) == 'wilayah') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2) == 'anggota') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/anggota') ?>"><i class="fa fa-circle-o "></i> Laporan Anggota TP PKK</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'keluarga') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/keluarga') ?>"><i class="fa fa-circle-o "></i> Laporan Keluarga</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'kader') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/kader') ?>"><i class="fa fa-circle-o "></i> Laporan Kader</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'event') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/event') ?>"><i class="fa fa-circle-o "></i> Laporan Event</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'pengguna') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/pengguna') ?>"><i class="fa fa-circle-o "></i> Laporan Pengguna</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'wilayah') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/wilayah') ?>"><i class="fa fa-circle-o "></i> Laporan Wilayah</a></li>
                    <li class="<?php echo ($this->uri->segment(2) == 'inventaris') ? 'active' : ''; ?>"><a href="<?php echo site_url('laporan/inventaris') ?>"><i class="fa fa-circle-o "></i> Laporan inventaris</a></li>
                </ul>
            </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>
