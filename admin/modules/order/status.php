<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$sql = "UPDATE orders set status = $st WHERE id = $id";
$stm = $conn->prepare($sql);
$stm->execute();
header('location: index.php?m=order&a=detail&id='.$id);
?>