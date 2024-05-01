<?php 
use App\Models\Menu_model;
use App\Libraries\Website;
$this->website  = new Website(); 
$m_menu         = new Menu_model();
$nav_profil     = $m_menu->profil('Profil');
$nav_profil2    = $m_menu->profil('Profil');
$nav_berita     = $m_menu->berita();
$nav_layanan    = $m_menu->profil('Layanan');
$nav_layanan2   = $m_menu->profil('Layanan');
$nav_cabang     = $m_menu->cabang('Publish');
?>
<!--==============================
Header Area
==============================-->
<header class="as-header header-layout1">
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="<?php echo base_url() ?>">
                                    <img src="<?php echo $this->website->logo() ?>" alt="<?php echo $this->website->namaweb() ?>" style="max-width: 250px; max-height: 80px; width: auto; height: auto;"></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <nav class="main-menu d-none d-lg-inline-block">
                                            <ul>
                                                <li>
                                                    <a href="<?php echo base_url() ?>">Home</a>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">Services</a>
                                                    <ul class="sub-menu">
                                                        <?php foreach($nav_layanan2 as $nav_layanan2) { ?>
                                                            <li><a href="<?php echo base_url('layanan/detail/'.$nav_layanan2->slug_berita) ?>"><?php echo $nav_layanan2->judul_berita ?></a></li>
                                                        <?php } ?>
                                                        <li><a href="<?php echo base_url('layanan') ?>">All Services</a></li>
                                                    </ul>
                                                </li>
                                                <!-- profil -->
                                                <li class="menu-item-has-children mega-menu-wrap">
                                                    <a href="#">About Us</a>
                                                    <ul class="mega-menu  mega-menu mega-menu-dark">
                                                        <li><a href="<?php echo base_url('profil') ?>">About Us</a>
                                                            <ul>
                                                                <?php foreach($nav_profil as $nav_profil) { ?>
                                                                    <li><a href="<?php echo base_url('profil/'.$nav_profil->slug_berita) ?>"><?php echo $nav_profil->judul_berita ?></a></li>
                                                                <?php } ?>
                                                                <li><a href="<?php echo base_url('staff') ?>">Team <?php echo $this->website->namaweb() ?></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="<?php echo base_url('layanan') ?>">Product and Services</a>
                                                            <ul>
                                                                <?php foreach($nav_layanan as $nav_layanan) { ?>
                                                                    <li><a href="<?php echo base_url('layanan/detail/'.$nav_layanan->slug_berita) ?>"><?php echo $nav_layanan->judul_berita ?></a></li>
                                                                <?php } ?>
                                                                <li><a href="<?php echo base_url('layanan') ?>">All Services</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Gallery</a>
                                                            <ul>
                                                                <li><a href="<?php echo base_url('galeri') ?>">Image Gallery</a></li>
                                                                <li><a href="<?php echo base_url('video') ?>">Video Gallery</a></li>
                                                                <li><a href="<?php echo base_url('download') ?>">Download File</a></li>
                                                            </ul>
                                                        </li>
                                                        
                                                    </ul>
                                                </li>
                                                <!-- end profil -->
                                                <li class="menu-item-has-children">
                                                    <a href="#">News</a>
                                                    <ul class="sub-menu">
                                                        <?php foreach($nav_berita as $nav_berita) { ?>
                                                            <li><a href="<?php echo base_url('berita/kategori/'.$nav_berita->slug_kategori) ?>"><?php echo $nav_berita->nama_kategori ?></a></li>
                                                        <?php } ?>
                                                        <li><a href="<?php echo base_url('berita') ?>">All News</a></li>
                                                    </ul>
                                                </li>
                                                
                                                
                                                <li>
                                                    <a href="<?php echo base_url('kontak') ?>">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <button type="button" class="as-menu-toggle d-inline-block d-lg-none">
                                            <i class="far fa-bars"></i>
                                        </button>
                                    </div>
                                    <div class="col-auto d-none d-xxl-block">
                                        <div class="header-button">
                                            <?php if(Session()->get('username_patient') != '') { ?>
                                                <a href="<?php echo base_url('patient/dasbor') ?>" class="btn btn-primary btn-sm" title="Masuk ke Dasbor">
                                                    <i class="fa fa-user"></i> <?php echo substr(Session()->get('patient_full_name'),0,6) ?>..
                                                </a>
                                                <a href="<?php echo base_url('register/booking') ?>" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Booking</a>
                                                <a href="<?php echo base_url('signin/logout') ?>" class="btn btn-warning btn-sm" title="Logout">
                                                    <i class="fa fa-sign-out-alt"></i>
                                                </a>
                                            <?php }else{ ?>
                                                
                                                <a href="<?php echo base_url('signin') ?>" class="btn btn-primary btn-sm"><i class="fa fa-lock"></i> Signin</a>
                                                <a href="<?php echo base_url('register') ?>" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Register</a>
                                            <?php } ?>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> 
