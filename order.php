<?php include 'header.php' ?>


	<!-- Characteristics -->

	<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Process checkout</h3>
                <div class="alert alert-warning">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<strong>Note! </strong> You can login using your accoutn here <a class="btn-link" href="register.php">Login or Register</a> ...
                </div>
			<?php if(totalQtt()) : ?>
                <div class="row">
				<!-- Char. Item -->
				<div class="col-md-7">
					<legend>Order review</legend>

					<table class="table table">
							<thead>
								<tr>
									<th style="width: 20px;text-align: center">#NO</th>
									<th>Image</th>
									<th>Product Name</th>
									<th>Price</th>
									<th style="width: 20px;text-align: center">Quantity</th>
									<th style="width: 20px;text-align: center">Subtotal</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$stt = 1;
								foreach(get_cart() as $cart) {
							 ?>
								<tr>
									<td style="width: 20px;text-align: center"><?php echo $stt ?></td>
									<td>
										<img src="public/uploads/<?php echo $cart['image'] ?>" width="50">
									</td>
									<td><?php echo $cart['name'] ?></td>
									<td>$<?php echo number_format($cart['price']) ?></td>
									<td style="width: 20px;text-align: center"><?php echo $cart['quantity'] ?></td>
									<td class="product-subtotal">$<?= $cart['quantity']*$cart['price'] ?></td>
								</tr>
							<?php  $stt ++; } ?>
							</tbody>

						</table>
						<div class="clearfix"></div>
						<div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>
                            	Total products <span>$<?= number_format(totalPrice()) ?></span>
                            </h5>
                            <h5>Total tax <span><?= getPromo() ?> %</span></h5>
                   
                            <h4 class="grand-totall-title">Grand Total  <span>$<?= number_format(totalPricePromo()) ?></span></h4>
                        </div>
				</div>

				<!-- Char. Item -->
				<div class="col-md-5">
					<form action="order-process.php" method="POST" >
						<legend>Form Order</legend>
						<strong>Your infomations</strong>
						<div class="form-group">
							<label for="">Full Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="name" placeholder="Your full name" required value="<?= $login['name'] ?>">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Email <span class="text-danger">*</span></label>
									<input type="@" class="form-control" name="email" placeholder="Your email address" required value="<?= $login['email'] ?>">
								</div>
						
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Phone <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="phone" placeholder="Your email address" required value="<?= $login['phone'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Address <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="address" placeholder="Your address" required value="<?= $login['address'] ?>">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Shipping Method </label>
									<select name="shipping" class="form-control">
										<option value="">Chose One</option>
										<option value="Shipping online">Shipping online</option>
										<option value="Shipping by post">Shipping by post</option>
									</select>
								</div>
						
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Payment Method</label>
									<select name="shipping" class="form-control">
										<option value="">Chose One</option>
										<option value="Pay online visa card">Pay online visa card</option>
										<option value="Payment on delivery">Payment on delivery</option>
									</select>
								</div>
							</div>
						</div>

						<input type="checkbox" id="Receiver" name="IsReceiver">
						<strong>Receiver infomations</strong>
						<div id="form-Receiver" class="mt-15">

							<div class="form-group">
								<label for="">Full Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="rcname" placeholder="Receiver full name">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Email <span class="text-danger">*</span></label>
										<input type="@" class="form-control" name="rcemail" placeholder="Receiver email address">
									</div>
							
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Phone <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="rcphone" placeholder="Receiver email address">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Address <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="rcaddress" placeholder="Receiver address">
							</div>		
						</div>		
						
						<div class="cart-shiping-update mt-10">
                            <div class="cart-clear">
                                <button type="submit">Submit</button>
                                <button type="reset">Reset</button>
                            </div>
                        </div>
						
					</form>
					
				</div>

				<!-- Char. Item -->
			</div>
			<?php else: ?>
				<div class="alert alert-danger" style="width: 100%">
					<strong>Error! </strong> shopping cart í empty ...
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Deals of the week -->

<?php include 'footer.php' ?>

<script type="text/javascript">
	$('#form-Receiver').hide();

	if($('input#Receiver').is(':checked')){
		$('#form-Receiver').show(1000);
	}

	$('input#Receiver').click(function(){
		if($(this).is(':checked')){
			$('#form-Receiver').show(1000);
		}else{
			$('#form-Receiver').hide();
		}
	})
</script>