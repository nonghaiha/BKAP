<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT o.id,o.status,o.orders_date,o.promo,o.name,o.email,o.address,o.phone, SUM(dt.price*dt.quantity) total FROM orders o  JOIN order_product dt ON o.id = dt.order_id AND o.id = $id GROUP BY o.id,o.status,o.orders_date,o.promo,o.name,o.email,o.address,o.phone";
	$stm = $conn->prepare($sql);
	$stm->setFetchMode(PDO::FETCH_ASSOC);
	$stm->execute();
	$order = $stm->fetch();

	$sqlp = "SELECT p.name,p.image,dp.price,dp.quantity from order_product dp JOIN product p on p.id = dp.product_id AND dp.order_id = $id";
	$stmp = $conn->prepare($sqlp);
	$stmp->setFetchMode(PDO::FETCH_ASSOC);
	$stmp->execute();
	$products = $stmp->fetchAll();
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Order detail</h3>
</div>
<div class="box-body">
	<div class="row">
				<div class="col-md-6">
					<h4>
						Order infomation
						<?php if($order['status'] == 1) : ?>
						
						<a href="index.php?m=order&a=status&st=0&id=<?php echo $id; ?>" class="label label-danger">Approved...</a>
						<a href="index.php?m=order&a=status&st=2&id=<?php echo $id; ?>" class="label label-success">Delivered...</a>
						<?php elseif($order['status'] == 2): ?>
							<a href="" class="label label-primary">Delivered..</a>
						<?php else: ?>
							<a href="index.php?m=order&a=status&st=1&id=<?php echo $id; ?>" class="label label-danger">Pendding...</a>
						<?php endif; ?>
						
					</h4>
					<table class="table table-bordered table-hover">
						<tr>
							<td>#ID</td>
							<td><?php echo $order['id'] ?></td>
						</tr>
						<tr>
							<td>Order date</td>
							<td><?php echo $order['orders_date'] ?></td>
						</tr>
						<tr>
							<td>Total Price</td>
							<td>
								<?php if($order['promo']) : ?>
								<s>$<?php echo number_format($order['total']) ?></s>
								$<?php echo number_format(caculPromo($order['total'], $order['promo'])) ?>
								<?php else: ?>
									$<?php echo number_format($order['total']) ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>Promotion value</td>
							<td><?php echo $order['promo'] ?> %</td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<h4>Receiver Infomation</h4>
					<table class="table table-bordered table-hover">
					
						<tr>
							<td>Full name</td>
							<td><?php echo $order['name'] ?></td>
						</tr>
						<tr>
							<td>Email address</td>
							<td><?php echo $order['email'] ?></td>
						</tr>
						<tr>
							<td>Phone number</td>
							<td><?php echo $order['phone'] ?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo $order['address'] ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="clearfix"></div>
			<h4>Product detail</h4>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th style="width: 20px; text-align: center">#NO</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Price</th>
						<th style="width: 30px; text-align: center">Quantity</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$stt = 1;
					foreach($products as $pro) {
				 ?>
					<tr>
						<td style="width: 20px; text-align: center"><?php echo $stt; ?></td>
						<td>
							<img src="../public/uploads/<?php echo $pro['image'] ?>" width="50">
						</td>
						<td><?php echo $pro['name'] ?></td>
						<td>$<?php echo number_format($pro['price']) ?></td>
						<td style="width: 30px; text-align: center"><?php echo $pro['quantity'] ?></td>
					
					</tr>
				<?php  $stt ++; } ?>
				</tbody>
			</table>
</div>