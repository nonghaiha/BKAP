<div class="col-md-9">
	<?php 
		$ps = getAll(['table' => 'promotion']);
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$ps = getAll(['table' => 'promotion','where' => "name LIKE '%$key%'" ]);
		}

		$total = count($ps);
		$limit = 10;
		$page = ceil($total/$limit);
		$getPage = !empty($_GET['page']) ? $_GET['page'] : 1;
		$start = ($getPage-1) * $limit;

		$sql = "SELECT id,name,value,code from promotion ";
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$sql .= " WHERE name LIKE '%$key%' ";
		}

		$sql .= "Order By id DESC LIMIT $start, $limit";
		$stm = $conn->prepare($sql);
		$stm->execute(); $stm->setFetchMode(PDO::FETCH_ASSOC);
		$promotions = $stm->fetchAll();

	?>
	<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th style="width: 20px; text-align: center">#NO</th>
			<th>Promotion Name</th>
			<th>Promotion Code</th>
			<th>Promotion Value</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach($promotions as $promo) : ?>
		<tr>
			<td><?php echo $n ?></td>
			<td><?php echo $promo['name'] ?></td>
			<td><?php echo $promo['code'] ?></td>
			<td><?php echo $promo['value'] ?></td>
			<td  style="width: 100px; text-align: center">
                <a href="index.php?m=promo&a=edit&id=<?php echo $promo['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <a href="index.php?m=promo&a=delete&id=<?php echo $promo['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wan to delete it ?')"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
	<?php $n++; endforeach; ?>
	</tbody>
</table>
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