<?php 
	$productsRand = getAll(['table' => 'product','limit' => 10,'rand' => true]); 
?>		
<div class="best-food-area pt-100 pb-95">
    <div class="container">
        <div class="row">
            
            <div class="best-food-width-2">
                <div class="product-top-bar section-border mb-25">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Best Food In Our Shop</h3>
                    </div>
                
                </div>
                <div class="tab-content jump">
                    <div id="tab4" class="tab-pane active">
                        <div class="product-slider-active owl-carousel product-nav">
                        <?php array_walk($productsRand, function($pro){ ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="detail.php?product=<?= $pro['id'] ?>">
                                        <img src="public/uploads/<?= $pro['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="cart-process.php?id=<?= $pro['id'] ?>"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href=""><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="detail.php?product=<?= $pro['id'] ?>"><?= $pro['name'] ?> </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <?php if($pro['sale_price'] > 0) : ?>
                                            <span>$<?= $pro['sale_price'] ?></span>
                                            <span class="product-price-old">$<?= $pro['price'] ?> </span>
                                        <?php else: ?>
                                            <span>$<?= $pro['price'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php })  ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="best-food-width-1 mrg-small-35">
                <div class="single-banner">
                    <div class="hover-style">
                        <a href="#"><img src="public/img/banner/banner-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="best-food-width-1">
                <div class="single-banner">
                    <div class="hover-style">
                        <a href="#"><img src="public/img/banner/banner-5.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>