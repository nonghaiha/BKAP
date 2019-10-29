<?php 
$visibility = 'hidden';
$isProduct = true;
include 'header.php' ;
$pro = false;
if (!empty($_GET['product'])) {
	$id = $_GET['product'];
	$pro = getById(['table' => 'product','value' => $id]);
	$cat_id = $pro ? $pro['category_id'] : 0;
	$cat = getById(['table' => 'category','value' => $cat_id]);
	$products = getAll(['table' => 'product','where' => 'category_id = '.$cat_id]);
}

?>
<?php if($pro) : ?>
<div class="product-details pt-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="public/uploads/<?= $pro['image'] ?>" data-zoom-image="assets/img/product-details/product-detalis-bl1.jpg" alt="zoom">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $pro['name'] ?></h4>
                    <?php if($pro['sale_price'] > 0) : ?>
                        <span>$<?= $pro['sale_price'] ?></span>
                        <span style="font-weight: normal;margin-left: 25px;font-size: 20px"><s>$<?= $pro['price'] ?> </s></span>
                    <?php else: ?>
                        <span>$<?= $pro['price'] ?></span>
                    <?php endif; ?>
                    <div>
                    	<p>
                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut perspiciatis nam cumque eum fuga illum sequi, dicta earum dolorum incidunt provident animi unde assumenda reprehenderit numquam, dolorem delectus impedit saepe.
                    	</p>
                    	<p>
                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut perspiciatis nam cumque eum fuga illum sequi, dicta earum dolorum incidunt provident animi unde assumenda reprehenderit numquam, dolorem delectus impedit saepe.
                    	</p>
                    </div>
                    <div class="pro-dec-feature">
                        <ul>
                            <li><input type="checkbox"> Chicken Popeyes: <span>  $4.99</span></li>
                            <li><input type="checkbox"> Organic Smoothie : <span> $9.99</span></li>
                            <li><input type="checkbox"> Beef Burger With Extra Cheese: <span> Red  $16.99</span></li>
                            <li><input type="checkbox"> Fries McDonald's: <span>$14.99</span></li>
                        </ul>
                    </div>
                    <div class="pro-details-cart-wrap">
                        <form action="cart-process.php">
                        	<input type="hidden" name="id" value="<?= $pro['id'] ?>">
                        	<div class="shop-list-cart-wishlist">
	                            <button title="Add To Cart" href="#">
	                                <i class="ion-android-cart"></i>
	                            </button>
	                            <a title="Wishlist" href="#">
	                                <i class="ion-ios-heart-outline"></i>
	                            </a>
	                        </div>
	                        <div class="product-quantity">
	                            <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
	                                <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
	                            <div class="inc qtybutton">+</div></div>
	                        </div>
                        </form>
                    </div>
                    
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                            <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-100">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                    	<?php echo $pro['content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Not found</strong> product dose not exists ...
	</div>
<?php endif; ?>
<?php include 'footer.php' ?>
