<?php 
$visibility = 'hidden';

include 'header.php';

?>
	
	<!-- Characteristics -->
	<div class="shop-page-area pt-100 pb-100">
		<div class="container">
			<h3 class="page-title">All orders</h3>
			<?php if($login['id']) : 
				$account_id = $login['id'];
				$sql = "
					SELECT o.id,o.status,o.orders_date, o.promo, SUM(dt.price*dt.quantity) total FROM orders o  JOIN order_product dt ON o.id = dt.order_id WHERE o.account_id = $account_id GROUP BY o.id, o.orders_date, o.promo,o.status";
				$stm = $conn->prepare($sql);
				$stm->setFetchMode(PDO::FETCH_ASSOC);
				$stm->execute();
				$orders = $stm->fetchAll();
			?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#NO</th>
						<th>Created</th>
						<th>Total Price</th>
						<th>Promo</th>
						<th>Pay Price</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$stt = 1;
					foreach($orders as $order) {
				 ?>
					<tr>
						<td><?php echo $stt; ?></td>
						<td><?php echo $order['orders_date'] ?></td>
						<td>$<?php echo number_format($order['total']) ?></td>
						<td><?php echo $order['promo'] ?> %</td>
						<td>$<?php echo number_format(caculPromo($order['total'],$order['promo'])) ?></td>
						<td>
							<?php if($order['status'] == 1) : ?>
								<span class="label label-success">Approved.</span>
							<?php elseif($order['status'] == 2): ?>
								<span class="label label-primary">Delivered</span>
							<?php else: ?>
								<span class="label label-danger">Pedding...</span>
							<?php endif; ?>
						</td>
						<td>
							<a href="order_detail.php?id=<?= $order['id'] ?>" class="">
								<span class="fa fa-eye"></span>
							</a>
						</td>
					</tr>
				<?php  $stt ++; } ?>
				</tbody>
			</table>
			<?php else: ?>
				<div class="alert alert-danger" style="width: 100%">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Error</strong> You are not login in ...
				</div>
			<?php endif; ?>
		</div>
	</div>


	<!-- Footer -->
<?php include 'footer.php'; ?>