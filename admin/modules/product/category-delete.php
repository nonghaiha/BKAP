<?php 
$dir = dirname(dirname(dirname(dirname(__FILE__))));

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$product = getById(['table' =>'product','value'=>$id,'key' =>'category_id']);
if (!$product) {
	$sql = "DELETE FROM category WHERE id = $id";
	$stm = $conn->prepare($sql);
	$stm->execute();
	header('location: index.php?m=product&a=category');
}else{
	echo '<h3>Coud not delete this category, this product having product</h3>';
}

?>
