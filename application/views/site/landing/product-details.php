<?php $this->load->view('site/common/header'); ?>
<style>
    .product-details-des .pro-size .nice-select {
    width: 115px;
    height: 40px;
    line-height: 40px;
    border-radius: 40px;
}
</style>
<main>
    <!-- breadcrumb area start -->
    </br>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="shop.html"><?php echo $featured_products->cname; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $featured_products->sub_cat_name; ?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img1.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img2.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img3.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img4.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img5.jpg"
                                            alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img1.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img2.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img3.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img4.jpg"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="<?php echo base_url();?>images/site/product/product-details-img5.jpg"
                                            alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">

                                    <h3 class="product-name"><?php echo $featured_products->pname; ?></h3>

                                    <!--div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div-->
                                    <?php $featured_product_details = json_decode($featured_products->details); 
                                   
                                    ?>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>stock</span>
                                    </div>
                                    <p class="pro-desc"><?php echo $featured_product_details->description; ?></p>
                                    <?php foreach($featured_product_details->specification as $specification) :?>
                                   <div class="mt-3" > <?php foreach($specification as $key => $value) { ?>
                                    
                                    <p><b><?php echo str_replace("_"," ",$key); ?>: </b> <span><?php echo $value; ?></span>
                                    <p>
                                     <?php   } ?>
                                   </div>
                                    <?php endforeach; ?>
                                    <div class="pro-size">
                                        <h6 class="option-title">Color :</h6>
                                        <select class="nice-select">
                                            <option>White Gold</option>
                                            <option>Rose Gold</option>
                                            <option>Yellow Gold</option>

                                        </select>
                                    </div>
                                    <div class="pro-size">
                                        <h6 class="option-title">Diamond Quality:</h6>
                                        <select class="nice-select">
                                            <option>VS/G</option>
                                            <option>SI/G</option>
                                        </select>
                                    </div>
                                    <div class="pro-size">
                                        <h6 class="option-title">Gold Purity:</h6>
                                        <select class="nice-select">
                                            <option>585</option>
                                            <option>1000</option>

                                        </select>
                                    </div>

                                    <div class="useful-links">

                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->

                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Related Products</h2>
                        <p class="sub-title">Add related products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img"
                                        src="<?php echo base_url();?>images/site/product/product-11.jpg" alt="product">
                                    <img class="sec-img" src="<?php echo base_url();?>images/site/product/product-8.jpg"
                                        alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img"
                                        src="<?php echo base_url();?>images/site/product/product-12.jpg" alt="product">
                                    <img class="sec-img" src="<?php echo base_url();?>images/site/product/product-7.jpg"
                                        alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Handmade Golden Necklace</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$50.00</span>
                                    <span class="price-old"><del>$80.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img"
                                        src="<?php echo base_url();?>images/site/product/product-13.jpg" alt="product">
                                    <img class="sec-img" src="<?php echo base_url();?>images/site/product/product-6.jpg"
                                        alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$99.00</span>
                                    <span class="price-old"><del></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img"
                                        src="<?php echo base_url();?>images/site/product/product-14.jpg" alt="product">
                                    <img class="sec-img" src="<?php echo base_url();?>images/site/product/product-5.jpg"
                                        alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>15%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Diamond Exclusive Ornament</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$55.00</span>
                                    <span class="price-old"><del>$75.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img"
                                        src="<?php echo base_url();?>images/site/product/product-15.jpg" alt="product">
                                    <img class="sec-img" src="<?php echo base_url();?>images/site/product/product-4.jpg"
                                        alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Citygold Exclusive Ring</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>
<?php $this->load->view('site/common/footer'); ?>