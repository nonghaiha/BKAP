<?php 
$ps = getAll(['table' => 'product']);
if (!empty($_GET['key'])) {
	$key = $_GET['key'];
	$ps = getAll(['table' => 'product','where' => "name LIKE '%$key%'" ]);
}
$total = count($ps);
$limit = 10;
$page = ceil($total/$limit);
$getPage = !empty($_GET['page']) ? $_GET['page'] : 1;
$start = ($getPage-1) * $limit;

$sql = "SELECT id,name,image,price,sale_price from product ";
if (!empty($_GET['key'])) {
	$key = $_GET['key'];
	$sql .= " WHERE name LIKE '%$key%' ";
}

$sql .= "Order By id DESC LIMIT $start, $limit";
$stm = $conn->prepare($sql);
$stm->execute(); $stm->setFetchMode(PDO::FETCH_ASSOC);
$products = $stm->fetchAll();
?>
<div class="box-header with-border">
  <h3 class="box-title">Product Manager</h3>
</div>
<div class="box-header">
	<form action="index.php" method="get" class="form-inline" role="form">
	    <input type="hidden" name="m" value="product">
	    <input type="hidden" name="page" value="<?php echo $getPage ?>">
		<div class="form-group">
			<label class="sr-only" for="">label</label>
			<input class="form-control" name="key" placeholder="Input field">
		</div>
		<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		<a href="index.php?m=product&a=add" class="btn btn-success"><i class="fa fa-plus"></i></a>
	</form>
</div>
<div class="box-body">
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th style="width: 20px; text-align: center">#NO</th>
			<th style="width: 52px; text-align: center">Image</th>
			<th>Product Name</th>
			<th>Price</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach($products as $pro) : ?>
		<tr>
			<td><?php echo $n ?></td>
			<td>
				<img src="../public/uploads/<?php echo $pro['image'] ?>" width="50">
			</td>
			<td><?php echo $pro['name'] ?></td>
			<td>$<?php echo number_format($pro['price']) ?></td>
			<td  style="width: 100px; text-align: center">
                <a href="index.php?m=product&a=edit&id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <a href="index.php?m=product&a=delete&id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wan to delete it ?')"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
	<?php $n++; endforeach; ?>
	</tbody>
</table>
</div>
<div class="box-footer">
	<ul class="pagination">
		<li><a href="#">&laquo;</a></li>
		<?php for($i=1; $i<= $page; $i++) : 
	     $active = $getPage == $i ? 'class="active"': '';
		?>
		<li <?php echo $active; ?>>
			<?php if(!empty($_GET['key'])) : $key =  $_GET['key']; ?>
			<a href="index.php?m=product&page=<?php echo $i; ?>&key=<?php echo $key ?>"><?php echo $i ?></a>
			<?php else: ?>
			<a href="index.php?m=product&page=<?php echo $i; ?>"><?php echo $i ?></a>
			<?php endif; ?>
		</li>
		<?php endfor; ?>
		<li><a href="#">&raquo;</a></li>
	</ul>
</div>