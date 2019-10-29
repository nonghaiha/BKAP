<?php $visibility = 'hidden'; include 'header.php' ?>

	<!-- Banner -->
	<div class="shop-page-area pt-100 pb-100">
		<div class="home_background parallax-window" ></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<?php if(isset($_GET['sccess']) && $_GET['sccess'] == 1) : ?>
			<?php 
				unset($_SESSION['cart']);
				unset($_SESSION['promo']);
			?>
			<h2 class="home_title">Order successfully</h2>
			<h2 class="home_title">Thanks you</h2>
			<?php else: ?>
			<h2 class="home_title">Order failed</h2>
			<h2 class="home_title">Please check again</h2>
			<?php endif; ?>
		</div>
	</div>

	<!-- Characteristics -->

	

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