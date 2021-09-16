<?php $urls = $this->uri->segment(1) ?>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav">
		<li class="<?= $urls == "welcome" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="icon-home4"></i> Home</a></li>
			
		<?php if (level() == 1) { ?>
		<li class="<?= $urls == "tiket" ? "active" : null ?>"><a href="<?= site_url('tiket') ?>"><i class="fa fa-qrcode"></i> Tiket Masuk</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-archive"></i> PARKIR<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">List Kendaraan Keluar</a></li>
					<li><a href="#">Lits Kendaraan Masuk</a></li>
				</ul>
			</li>
		<li class="<?= $urls == "parkir" ? "active" : null ?>"><a target="blank" href="<?= site_url('parkir') ?>"><i class="fa fa-car"></i> Kasir Parkir</a></li>
		<?php } else if (level() == 2) { ?>
			<li class="<?= $urls == "tiket" ? "active" : null ?>"><a href="<?= site_url('tiket') ?>"><i class="fa fa-qrcode"></i> Order Tiket</a></li>
			<li class="<?= $urls == "parkir" ? "active" : null ?>"><a href="<?= site_url('parkir') ?>"><i class="fa fa-car"></i> Kasir Parkir</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-archive"></i> PARKIR<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">List Kendaraan Keluar</a></li>
					<li><a href="#">Lits Kendaraan Masuk</a></li>
				</ul>
			</li>
		<?php } else if (level() == 3) { ?>
			
		<?php } ?>
		<!-- <li class="<?= $urls == "mobil" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="fa fa-car"></i> Kasir Parkir Mobil</a></li> -->
		<!-- <li class="<?= $urls == "motor" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="fa fa-motorcycle"></i> Kasir Parkir Motor</a></li> -->
<!-- 		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5"></i> Pengaturan <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">Profil</a></li>
				<li><a href="#">Ganti Password</a></li>
			</ul>
		</li> -->
	</ul>
</div>