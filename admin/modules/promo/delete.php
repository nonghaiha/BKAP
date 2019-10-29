<?php 
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$sql = "DELETE FROM promotion WHERE id = $id";
	$stm = $conn->prepare($sql);
	$stm->execute();
	header('location: index.php?m=promo');
?>
