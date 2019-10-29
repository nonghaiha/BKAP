<?php 
$tab1 = getAll(['table' => 'product','limit' => 10,'whare category_id = 1']); 
?>

<div class="product-area pb-0">

    <div class="container">
        <div class="best-food-width-2">
            <div class="product-top-bar section-border mb-25">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title section-bg-white">New Products</h3>
                </div>
            </div>
        </div>
        <div class="tab-content jump">
            <div id="tab1" class="tab-pane active">
                <div class="row">
                <?php array_walk($tab1 , function($pro){ ?>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="public/uploads/<?= $pro['image'] ?>" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="cart-process.php?id=<?= $pro['id'] ?>"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php"><i class="ion-ios-heart-outline"></i></a>
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
                    </div>
			    <?php }) ?>
                    
                </div>
            </div>
            <div id="tab2" class="tab-pane">
                <div class="row">
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-10.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$100.00</span>
                                    <span class="product-price-old">$120.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-9.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['id'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$200.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add To Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$90.00</span>
                                    <span class="product-price-old">$100.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-8.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-6.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$60.00</span>
                                    <span class="product-price-old">$70.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-5.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$190.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-4.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$150.00</span>
                                    <span class="product-price-old">$170.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-3.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$80.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-2.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$180.00</span>
                                    <span class="product-price-old">$190.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-1.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$70.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab-pane">
                <div class="row">
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-5.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$100.00</span>
                                    <span class="product-price-old">$120.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-4.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$200.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-2.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$90.00</span>
                                    <span class="product-price-old">$100.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-3.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-1.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$60.00</span>
                                    <span class="product-price-old">$70.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-10.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$190.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-9.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$150.00</span>
                                    <span class="product-price-old">$170.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$80.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-8.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$180.00</span>
                                    <span class="product-price-old">$190.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="detail.php?product=<?= $pro['id'] ?>">
                                    <img src="assets/img/product/product-5.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Cart" href="#"><i class="ion-android-cart"></i> Add Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.php?id=<?= $pro['image'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                    <a href="detail.php?product=<?= $pro['id'] ?>">PRODUCTS NAME HERE </a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$70.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>