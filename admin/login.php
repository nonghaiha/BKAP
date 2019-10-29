<?php 
session_start();
include '../db/connect.php';
if (isset($_SESSION['admin_login'])) {
	header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
					<?php 
						if (!empty($_POST['email']) && !empty($_POST['pass'])) {
							$email = $_POST['email'];
							$pass = MD5($_POST['pass']);
							$sql = "SELECT id, email, name FROM account WHERE email = '$email' AND password = '$pass' AND type = 1";
							$stm = $conn->prepare($sql);
							$stm->setFetchMode(PDO::FETCH_ASSOC);
							$stm->execute();
							$acc = $stm->fetch();

							if ($acc) {
								$_SESSION['admin_login'] = $acc;
								header('location: index.php');
							}else{
								echo 'Email or pass not match';
							}
						}

					?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
</body>
</html>