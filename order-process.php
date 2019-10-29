<?php 
session_start();
include 'db/connect.php';
$account_id = 0;
if ($login) {
	$account_id = $login['id'];
}else{
	if (
		!empty($_POST['email']) 
		&& !empty($_POST['phone'])
		&& !empty($_POST['name'])
		&& !empty($_POST['address'])
	) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$password = MD5($phone);
		$ac = getById(['table' => 'account','key' => 'email','value' => $email]);
		if ($ac) {
			$account_id = $ac['id'];
		}else{
			$sql = "INSERT INTO account(name,email,phone,address,password) VALUES(?,?,?,?,?)";
			$data = array($name,$email,$phone,$address,$password);
			$account_id = execuSql($sql,$data);
		}
	}
}

$rcname = '';
$rcemail = '';
$rcphone = '';
$rcaddress = '';
$promo = getPromo();

if (
	!empty($_POST['rcemail']) 
	&& !empty($_POST['rcphone'])
	&& !empty($_POST['rcname'])
	&& !empty($_POST['rcaddress'])
) {
	$rcname = $_POST['rcname'];
	$rcemail = $_POST['rcemail'];
	$rcphone = $_POST['rcphone'];
	$rcaddress = $_POST['rcaddress'];
}

$flg = true;
if ($account_id) {
	$sqld = "INSERT INTO orders(account_id,name,email,phone,address,promo) VALUES(?,?,?,?,?,?)";
	$datad = array($account_id,$rcname,$rcemail,$rcphone,$rcaddress,$promo);
	$order_id = execuSql($sqld,$datad);
	if ($order_id) {
		foreach (get_cart() as $cart) {
			$sqlo = "INSERT INTO order_product(order_id,product_id,price,quantity) VALUES(?,?,?,?)";
			$datao = [
				$order_id, $cart['id'], $cart['price'], $cart['quantity']
			];
			$dtid = execuSql($sqlo,$datao);

			if($dtid == -1){

				$flg = false; break;
			}
		}

		if ($flg == false) {
			$sql = "DELETE FROM orders WHERE id = $order_id";
			$stmd = $conn->prepare($sql);
			$stmd->execute();
		}

	}
}

if ($flg == false) {
	header('location: order-success.php?sccess=0');
}else {
	header('location: order-success.php?sccess=1');
}

?>
