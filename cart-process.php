<?php 
session_start(); // khởi tạo session
include 'db/connect.php'; // file kết nối database
// lấy giá trị các tham số trên url
$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

// hành động thêm sản phẩm vào giỏ hàng
if ($action == 'add') {
	$pro = getById(['table' => 'product','value' => $id]);
	$pro['quantity'] = $quantity;
	$_SESSION['cart'][$id] = $pro;
}

// hành động xóa một sản phẩm khỏi giỏ hàng
if ($action == 'remove') {
	
}



// hành động xóa hết sản phẩm trong giỏ hàng
if ($action == 'clear') {
	
}

// hành động update số lượng trong giỏ hàng
if ($action == 'update') {

	$ids = isset($_GET['ids']) ? $_GET['ids'] : [];
	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : [];

	for($i = 0; $i< count($ids); $i++){
		$id = $ids[$i];
		
		if (isset($_SESSION['cart'][$id])) {
			if (is_numeric($quantity[$i]) & $quantity[$i] >= 1) {
				$qtt = ceil($quantity[$i]);
				$_SESSION['cart'][$id]['quantity'] = $qtt;
			}else{
				unset($_SESSION['cart'][$id]);
			}
			
		}
	}
}


header('location: cart-view.php');
?>