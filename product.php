<?php 
include 'header.php' ;

if (!empty($_GET['category'])) {
	$category = $_GET['category'];
	$cat = getById(['table' => 'category','value' => $category]);
	$products = getAll(['table' => 'product','where' => 'category_id = '.$category]);
}else{
	$products = getAll(['table' => 'product']);
}


?>
<div class="shop-page-area pt-100 pb-100">
    <div class="container">
     
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="banner-area pb-30">
                    <a href=""><img alt="" src="public/img/banner/banner-49.jpg"></a>
                </div>
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li ><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                        <p>Showing 1 - 20 of 30 results  </p>
                    </div>
                    <div class="product-sorting-wrapper">
                        <div class="product-shorting shorting-style">
                            <label>View:</label>
                            <select>
                                <option value=""> 20</option>
                                <option value=""> 23</option>
                                <option value=""> 30</option>
                            </select>
                        </div>
                        <div class="product-show shorting-style">
                            <label>Sort by:</label>
                            <select>
                                <option value="">Default</option>
                                <option value=""> Name</option>
                                <option value=""> price</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                        <?php array_walk($products , function($pro){ ?>
                            <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="detail.php?product=<?= $pro['id'] ?>">
                                            <img src="public/uploads/<?= $pro['image'] ?>" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Cart" href="cart-process.php?id=<?= $pro['id'] ?>"><i class="ion-android-cart"></i> Add Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist.php?id=<?= $pro['id'] ?>"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="detail.php?product=<?= $pro['id'] ?>"><?= $pro['name'] ?></a>
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
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="detail.php?product=<?= $pro['id'] ?>"><?= $pro['name'] ?> </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$<?= $pro['price'] ?></span>
                                            <span class="product-price-old">$<?= $pro['price'] ?> </span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                        <div class="shop-list-cart-wishlist">
                                            <a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a href="cart-process.php?id=<?= $pro['id'] ?>" title="Add To Cart"><i class="ion-android-cart"></i></a>
                                            <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                <i class="ion-android-open"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <?php }) ?>
                          
                        </div>
                    </div>
                    <div class="pagination-total-pages">
                        <div class="pagination-style">
                            <ul>
                                <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                            </ul>
                        </div>
                        <div class="total-pages">
                            <p>Showing 1 - 20 of 30 results  </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">
                            <ul id="faq">
                            <?php array_walk($cats, function($cat){ ?>
								<li><a href="product.php?category=<?= $cat['id'] ?>"><?= $cat['name'] ?></a></li>
							<?php }) ?>
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- Home -->

<?php include 'footer.php' ?>
