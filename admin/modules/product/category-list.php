<div class="col-md-9">
	<?php 
		$ps = getAll(['table' => 'category']);
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$ps = getAll(['table' => 'category','where' => "name LIKE '%$key%'" ]);
		}

		$total = count($ps);
		$limit = 10;
		$page = ceil($total/$limit);
		$getPage = !empty($_GET['page']) ? $_GET['page'] : 1;
		$start = ($getPage-1) * $limit;

		$sql = "SELECT id,name from category ";
		if (!empty($_GET['key'])) {
			$key = $_GET['key'];
			$sql .= " WHERE name LIKE '%$key%' ";
		}

		$sql .= "Order By id DESC LIMIT $start, $limit";
		$stm = $conn->prepare($sql);
		$stm->execute(); $stm->setFetchMode(PDO::FETCH_ASSOC);
		$categories = $stm->fetchAll();

	?>
	<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th style="width: 20px; text-align: center">#NO</th>
			<th>Category Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach($categories as $cat) : ?>
		<tr>
			<td><?php echo $n ?></td>
			<td><?php echo $cat['name'] ?></td>
			<td  style="width: 100px; text-align: center">
                <a href="index.php?m=product&a=category-edit&id=<?php echo $cat['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                <a href="index.php?m=product&a=category-delete&id=<?php echo $cat['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wan to delete it ?')"><i class="fa fa-trash"></i></a>
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