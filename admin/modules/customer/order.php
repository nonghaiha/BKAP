<?php 
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT o.id,o.status,o.orders_date, o.promo,c.name,c.email,c.phone, SUM(dt.price*dt.quantity) total FROM orders o JOIN order_product dt ON o.id = dt.order_id JOIN account c ON c.id = o.account_id WHERE o.account_id = $id GROUP BY o.id, o.orders_date, o.promo,o.status,c.name,c.email,c.phone Order By o.id DESC";
				$stm = $conn->prepare($sql);
				$stm->setFetchMode(PDO::FETCH_ASSOC);
				$stm->execute();
				$orders = $stm->fetchAll();

 ?>
<div class="box-header with-border">
  <h3 class="box-title">Order Manager</h3>
</div>
<div class="box-body">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#NO</th>
				<th>Customer Name</th>
				<th>Customer phone</th>
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
				<td><?php echo $order['name'] ?></td>
				<td><?php echo $order['phone'] ?></td>
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
					<a href="index.php?m=order&a=detail&id=<?= $order['id'] ?>" class="">
						<span class="fa fa-eye"></span>
					</a>
				</td>
			</tr>
		<?php  $stt ++; } ?>
		</tbody>
	</table>
</div>