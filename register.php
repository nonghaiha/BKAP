<?php $visibility = 'hidden'; include 'header.php' ?>

	<!-- Characteristics -->

	<div class="shop-page-area pt-100 pb-100">
		<div class="container">
			<div class="row">
				<!-- Char. Item -->
				<div class="col-md-7">
				<?php
				$account_id= 0; 
				if (
					!empty($_POST['email']) 
					&& !empty($_POST['phone'])
					&& !empty($_POST['name'])
					&& !empty($_POST['address'])
					&& !empty($_POST['password'])
				) {
					$name = $_POST['name'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$address = $_POST['address'];
					$password = $_POST['password'];
					$hpassword = MD5($password);

					$sql = "INSERT INTO account(name,email,phone,address,password) VALUES(?,?,?,?,?)";
					$data = array($name,$email,$phone,$address,$hpassword);
					$account_id = execuSql($sql,$data);

				}
				if ($account_id) :
				?>				
					<div class="alert alert-success" style="width: 100%">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Register account success !</strong> Now, you can login ...
					</div>
				<?php endif; ?>	
					<form action="" method="POST" >
						<legend >Form Register</legend>
						<strong>Your infomations</strong>
						<div class="form-group mt-15">
							<label for="">Full Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="name" placeholder="Your full name" required>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Email <span class="text-danger">*</span></label>
									<input type="@" class="form-control" name="email" placeholder="Your email address" required>
								</div>
						
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Phone <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="phone" placeholder="Your email address" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Address <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="address" placeholder="Your address" required>
						</div>
						<div class="form-group">
							<label for="">Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control" name="password" placeholder="Your password" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</form>
				</div>

				<!-- Char. Item -->
				<div class="col-md-5">
					<?php 
						if (
							!empty($_POST['login_email']) 
							&& !empty($_POST['login_password'])
						) {
							$login_email = $_POST['login_email'];
							$login_password = $_POST['login_password'];
							$hpassword = MD5($login_password);
							$sql_lign = "SELECT * FROM account WHERE email = '$login_email' AND password = '$hpassword' AND type=0";
							$stm = $conn->prepare($sql_lign);
						    $stm->execute(); // thực hiện truy vấn
						    $stm->setFetchMode(PDO::FETCH_ASSOC);
						    $result = $stm->fetch(); // duyệt tất cả dữ liệu

						   if ($result) {
						   		$_SESSION['login'] = $result;
						   		header('location: index.php');
						   }else{
						   	echo '<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>failed!</strong> Login failed, email or passwor is invalid
							</div>';
						   		unset($_SESSION['login']);
						   }
						}
				 ?>
					<form action="" method="POST" >
						<legend>Form login</legend>
						<strong>Login infomations</strong>
						<div class="form-group mt-15">
							<label for="">Email <span class="text-danger">*</span></label>
							<input type="@" class="form-control" name="login_email" placeholder="Your email address" required>
						</div>
						<div class="form-group">
							<label for="">Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control" name="login_password" placeholder="Your password" required>
						</div>
						
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</form>
					
				</div>

				
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

<?php include 'footer.php' ?>

<script type="text/javascript">
	$('#form-Receiver').hide();

	if($('input#Receiver').is(':checked')){
		$('#form-Receiver').show(1000);
	}

	$('input#Receiver').click(function(){
		if($(this).is(':checked')){
			$('#form-Receiver').show(1000);
		}else{
			$('#form-Receiver').hide();
		}
	})
</script>