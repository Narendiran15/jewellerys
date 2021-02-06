<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if(isset($heading)){ echo $heading!=''?$heading.' - ':'';echo ucfirst($this->config->item('site_name'));} else { echo ucfirst($this->config->item('site_name')); }?>
    </title>
    <link rel="alternate" href="<?php echo base_url();?>">
    <meta content="<?php echo $this->config->item('site_name');?>" name="author">
    <meta content="<?php echo $this->config->item('meta_description');?>" name="description">
    <meta content="<?php echo $this->config->item('meta_keywords');?>" name="keywords">
    <meta property="fb:app_id" content="<?php echo $this->config->item('fb_app_id');?>">
    <meta property="og:site_name" content="<?php echo ucfirst($this->config->item('site_name'));?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo base_url();?>">
    <meta property="og:title" content="<?php echo $this->config->item('meta_title');?>">
    <meta property="og:description" content="<?php echo $this->config->item('meta_description');?>">
    <meta property="og:image"
        content="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:widgets:csp" content="on">
    <meta name="twitter:url" content="<?php echo base_url();?>">
    <meta name="twitter:description" content="<?php echo $this->config->item('meta_description');?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $this->config->item('meta_title');?>">
    <meta name="twitter:site" content="<?php echo $this->config->item('twitter_name');?>">
    <meta name="twitter:app:id" content="<?php echo $this->config->item('twitter_app_id');?>">
    <meta name="twitter:app:name:iphone" content="<?php echo ucfirst($this->config->item('site_name'));?>">
    <meta name="twitter:app:name:ipad" content="<?php echo ucfirst($this->config->item('site_name'));?>">
    <meta name="twitter:app:name:googleplay" content="<?php echo ucfirst($this->config->item('site_name'));?>">
    <meta name="twitter:app:id:googleplay" content="<?php echo base_url();?>">
    <meta name="twitter:app:url:iphone" content="<?php echo base_url();?>">
    <meta name="twitter:app:url:ipad" content="<?php echo base_url();?>">
    <meta name="twitter:app:url:googleplay" content="<?php echo base_url();?>">
    <link rel="shortcut icon" sizes="76x76" type="image/x-icon"
        href="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_favicon')!=''?$this->config->item('site_favicon'):'favicon.ico';?>" />
    <?php echo stripcslashes($this->config->item('google_analytics'));?>
    <script>
    var baseurl = "<?php echo base_url();?>";
    var popup_error_type =
        "<?php echo $this->session->flashdata('error_type')=="success"?$this->lang->line('success'):$this->lang->line('error');?>";
    var popup_message = "<?php echo $this->session->flashdata('alert_message');?>";
    var slider_timings =
        "<?php echo ($admin_settings->row()->banner_timings=="" || $admin_settings->row()->banner_timings=="0")?6000:$admin_settings->row()->banner_timings;?>";
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/site/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/site/style.css">
    <!-- jQuery JS -->
    <script src="<?php echo base_url();?>js/site/jquery-3.3.1.min.js"></script>
</head>

<body>
    <header class="header-area header-wide bg-gray">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Welcome to Sanagem Jewellery online store</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <!--ul class="nav align-items-center justify-content-end">
                                    <li class="curreny-wrap">
                                        $ Currency
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">$ USD</a></li>
                                            <li><a href="#">€ EURO</a></li>
                                        </ul>
                                    </li>
                                    <li class="language">
                                        <img src="<?php echo base_url();?>images/site/icon/en.png" alt="flag"> English
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#"><img src="<?php echo base_url();?>images/site/icon/en.png" alt="flag"> english</a></li>
                                            <li><a href="#"><img src="<?php echo base_url();?>images/site/icon/fr.png" alt="flag"> french</a></li>
                                        </ul>
                                    </li>
                                </ul-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url();?>images/site/logo/logo.png" alt="brand logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-7 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="active"><a href="index.html">Home</i></a>
                                            </li>
                                            <li class="active"><a href="index.html">Exclusives</i></a>
                                            </li>
                                            <li class="position-static"><a href="#">Top Collections <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    <?php for($i=0; $i<= 3; $i++ ){ ?>
                                                    <li class="mega-title">
                                                        <span><?php echo strtoupper($cat[$i]->cname); ?></span>
                                                        <ul>
                                                            <?php $result =  get_all_subcat_menus($cat[$i]->id);
                                                        for($j=0; $j<= 3; $j++ ) { ?>
                                                            <li>
                                                                <a href="shop.html">
                                                                    <?php echo ucwords($result[$j]->sub_cat_name);?>
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                    <?php } ?>
                                                    <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="product-details.html">
                                                            <img src="<?php echo base_url();?>images/site/banner/img1-static-menu.jpg"
                                                                alt="">
                                                        </a>
                                                    </li>
                                                    <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="product-details.html">
                                                            <img src="<?php echo base_url();?>images/site/banner/img2-static-menu.jpg"
                                                                alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Finished Jewelry</a></li>
                                            <li><a href="contact-us.html">Gems & Stones</a></li>
                                            <li><a href="contact-us.html">Contact us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-3">
                            <div
                                class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                </div>
                                <div class="header-configure-area">

                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <li><a href="login-register.html">Logout</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p class="pt-1">Narendiran</p>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">
                                                <i class="pe-7s-like"></i>
                                                <div class="notification">0</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification">2</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img src="<?php echo base_url();?>images/site/logo/logo.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="cart.html">
                                        <i class="pe-7s-shopbag"></i>
                                        <div class="notification">0</div>
                                    </a>
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here...">
                            <button class="search-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home version 01</a></li>
                                        <li><a href="index-2.html">Home version 02</a></li>
                                        <li><a href="index-3.html">Home version 03</a></li>
                                        <li><a href="index-4.html">Home version 04</a></li>
                                        <li><a href="index-5.html">Home version 05</a></li>
                                        <li><a href="index-6.html">Home version 06</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">pages</a>
                                    <ul class="megamenu dropdown">
                                        <li class="mega-title menu-item-has-children"><a href="#">column 01</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">shop grid left
                                                        sidebar</a></li>
                                                <li><a href="shop-grid-right-sidebar.html">shop grid right
                                                        sidebar</a></li>
                                                <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a>
                                                </li>
                                                <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-details-affiliate.html">product
                                                        details
                                                        affiliate</a></li>
                                                <li><a href="product-details-variable.html">product details
                                                        variable</a></li>
                                                <li><a href="product-details-group.html">product details
                                                        group</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
                                            <ul class="dropdown">
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title menu-item-has-children"><a href="#">column 04</a>
                                            <ul class="dropdown">
                                                <li><a href="my-account.html">my-account</a></li>
                                                <li><a href="login-register.html">login-register</a></li>
                                                <li><a href="about-us.html">about us</a></li>
                                                <li><a href="contact-us.html">contact us</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">shop grid layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">shop grid left sidebar</a></li>
                                                <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a>
                                                </li>
                                                <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                                <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">shop list layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a>
                                                </li>
                                                <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a>
                                                </li>
                                                <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">products details</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-details-affiliate.html">product details
                                                        affiliate</a></li>
                                                <li><a href="product-details-variable.html">product details variable</a>
                                                </li>
                                                <li><a href="product-details-group.html">product details group</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                        <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                        <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                        <li><a href="blog-details-audio.html">blog details audio</a></li>
                                        <li><a href="blog-details-video.html">blog details video</a></li>
                                        <li><a href="blog-details-image.html">blog details image</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="mobile-settings">
                        <ul class="nav">
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="currency" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Currency
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="currency">
                                        <a class="dropdown-item" href="#">$ USD</a>
                                        <a class="dropdown-item" href="#">$ EURO</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                        <a class="dropdown-item" href="my-account.html">my account</a>
                                        <a class="dropdown-item" href="login-register.html"> login</a>
                                        <a class="dropdown-item" href="login-register.html">register</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="#">0123456789</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#">info@yourdomain.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="off-canvas-social-widget">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    </header>