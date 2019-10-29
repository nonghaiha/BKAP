<?php 
$visibility = 'hidden';

include 'header.php';
if (!empty($_GET['promo'])) {
	$promo = $_GET['promo'];
	$prom = getById(['table' => 'promotion','key' => 'code','value' => $promo]);

	if ($prom) {
		$_SESSION['promo'] = $prom['value'];
	}else{
		unset($_SESSION['promo']);
	}
}
?>
	<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="cart-process.php">
							<input type="hidden" name="action" value="update">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										$stt = 1;
										foreach(get_cart() as $cart) {
									?>
										<input type="hidden" name="ids[]" value="<?php echo $cart['id'] ?>">
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="public/uploads/<?= $cart['image'] ?>" alt="" width="60"></a>
                                            </td>
                                            <td class="product-name"><a href="detail.php?product=<?= $cart['id'] ?>"><?= $cart['name'] ?> </a></td>
                                            <td class="product-price-cart"><span class="amount">$<?= $cart['price'] ?></span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                                    <input class="cart-plus-minus-box" type="text" name="quantity[]" value="<?= $cart['quantity'] ?>">
                                                <div class="inc qtybutton">+</div></div>
                                            </td>
                                            <td class="product-subtotal">$<?= $cart['quantity']*$cart['price'] ?></td>
                                            <td class="product-remove">
                                                <!-- <a href="#"><i class="fa fa-pencil"></i></a> -->
                                                <a href="cart-process.php?id=<?= $cart['id'] ?>&action=remove" onclick="return confirm('Are You source wan to remove it?')"><i class="fa fa-times"></i></a>
                                           </td>
                                        </tr>
                                        <?php  $stt ++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button>Update Shopping Cart</button>
                                            <a href="cart-process.php?action=clear" onclick="return confirm('Are You source wan to remove all?')">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                       <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form accept="">
                                            <input type="text" class="form-control" required name="promo">
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>
                                    	Total products <span>$<?= number_format(totalPrice()) ?></span>
                                    </h5>
                                    <h5>Total tax <span><?= getPromo() ?> %</span></h5>
                           
                                    <h4 class="grand-totall-title">Grand Total  <span>$<?= number_format(totalPricePromo()) ?></span></h4>
                                    <a href="order.php">Proceed to Checkout</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<!-- Footer -->
<?php include 'footer.php'; ?>