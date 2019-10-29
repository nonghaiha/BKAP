<div class="box-header">
	<h3>Customer Manager</h3>
</div>
<div class="box-body">
	
	<?php 
		$ps = getAll(['table' => 'account','where' => "type=0" ]);
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$ps = getAll(['table' => 'account','where' => "name LIKE '%$key%' AND type=0" ]);
		}

		$total = count($ps);
		$limit = 10;
		$page = ceil($total/$limit);
		$getPage = !empty($_GET['page']) ? $_GET['page'] : 1;
		$start = ($getPage-1) * $limit;

		$sql = "SELECT id,name,email,phone from account WHERE type = 0 ";
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$sql .= " AND name LIKE '%$key%' ";
		}

		$sql .= "Order By id DESC LIMIT $start, $limit";
		$stm = $conn->prepare($sql);
		$stm->execute(); $stm->setFetchMode(PDO::FETCH_ASSOC);
		$customers = $stm->fetchAll();

	?>
	<form action="" class="form-inline" role="form">
	
		<div class="form-group">
			<input type="hidden" name="m" value="customer">
			<input class="form-control" name="key" placeholder="Input key">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
	</form>
	<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th style="width: 20px; text-align: center">#NO</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach($customers as $customer) : ?>
		<tr>
			<td><?php echo $n ?></td>
			<td><?php echo $customer['name'] ?></td>
			<td><?php echo $customer['email'] ?></td>
			<td><?php echo $customer['phone'] ?></td>
			<td  style="width: 100px; text-align: center">
                <a href="index.php?m=customer&a=order&id=<?php echo $customer['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
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
		<a href="index.php?m=product&a=category&page=<?php echo $i; ?>&key=<?php echo $key ?>"><?php echo $i ?></a>
		<?php else: ?>
		<a href="index.php?m=product&a=category&page=<?php echo $i; ?>"><?php echo $i ?></a>
		<?php endif; ?>
	</li>
	<?php endfor; ?>
	<li><a href="#">&raquo;</a></li>
</ul>
</div>