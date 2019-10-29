<?php 
$dir = dirname(dirname(dirname(dirname(__FILE__))));

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$orders = getById(['table' =>'order_product','value'=>$id,'key' =>'product_id']);
if (!$orders) {
	$sql = "DELETE FROM product WHERE id = $id";
	$stm = $conn->prepare($sql);
	$stm->execute();
	header('location: index.php?m=product');
}else{
	echo '<h3>Coud not delete this product, this product in orders</h3>';
}

?>
