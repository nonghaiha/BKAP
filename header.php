<?php 
ob_start();
session_start(); // khởi tạo session
$acc = [
	'id' => '',
	'name' => '',
	'email' => '',
	'phone' => '',
	'address' => ''
];

$login = isset($_SESSION['login']) ? $_SESSION['login'] : $acc;
include 'db/connect.php';

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Fudink - Food & Drink eCommerce Bootstrap4 Template</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/animate.css">
        <link rel="stylesheet" href="public/css/owl.carousel.min.css">
        <link rel="stylesheet" href="public/css/slick.css">
        <link rel="stylesheet" href="public/css/chosen.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/simple-line-icons.css">
        <link rel="stylesheet" href="public/css/ionicons.min.css">
        <link rel="stylesheet" href="public/css/meanmenu.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/responsive.css">
        <script src="public/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                <p>Welcome to my shop ! </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">

                            <div class="account-curr-lang-wrap f-right">
                                
                            <?php if($login['name']) : ?>

                                <ul>
                                    <li class="top-hover"><a href="#"><?php echo $login['name'] ?>  <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="order-history.php">My Orders</a></li>
                                            <li><a href="wishlist.php">Wishlist</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                        <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="index.php">
                                    <img alt="" src="public/img/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <form class="navbar-form pull-right" action="search.php">
                                    <input type="text" style="width: 300px; padding:5px 10px" placeholder="Enter nam to search..." name="key">
                                    <button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
                                </form>
                               <?php if(!$login) : ?>
                                <div class="header-login">
                                    <a href="register.php">
                                        <div class="header-icon-style">
                                            <i class="icon-user icons"></i>
                                        </div>
                                        <div class="login-text-content">
                                            <p>Register <br> or <span>Sign in</span></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                                <div class="header-wishlist">
                                    <a href="index.php">
                                        <div class="header-icon-style">
                                            <i class="icon-heart icons"></i>
                                        </div>
                                        <div class="wishlist-text">
                                            <p>Your <br> <span>Wishlist</span></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="header-cart">
                                    <a href="" class="toggle-cart">
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                            <span class="count-style"><?= number_format(totalQtt()) ?></span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold">$<?= number_format(totalPrice()) ?></span>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <?php foreach(get_cart() as $cart) : ?>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="detail.php?product=<?= $cart['id'] ?>"><img alt="" src="public/uploads/<?= $cart['image'] ?>" width="80"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"><?= $cart['name'] ?> </a></h4>
                                                    <h6>Qty: <?= $cart['quantity'] ?></h6>
                                                    <span>$<?= $cart['price'] ?></span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="cart-process.php?id=<?= $cart['id'] ?>&action=remove"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        </ul>
                                         <div class="shopping-cart-total">
                                            <h4>Total tax: <span><?= getPromo() ?> %</span></h4>
                                            <?php if(getPromo()) : ?>
                                            <h4>Total : <s class="shop-total">$<?= number_format(totalPrice()) ?></s>
                                            <span class="shop-total">$<?= number_format(totalPricePromo()) ?></span></h4>
                                            <?php else: ?>
                                            <h4>Total : <span class="shop-total">$<?= number_format(totalPrice()) ?></span></h4>
                                            <?php endif; ?>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="cart-view.php">view cart</a>
                                            <a href="order.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">about</a></li>
                                        <li>
                                            <a href="product.php">Shop <i class="ion-chevron-down"></i></a>
                                            <ul class="submenu">
                                            <?php foreach($cats as $cat) : ?>
                                                <li><a href="product.php?category=<?= $cat['id'] ?>"><?= $cat['name'] ?></a></li>
                                                <?php endforeach; ?>
                                                
                                            </ul>
                                        </li>
                                        
                                        <li><a href="blog.php">BLogs</a></li>
                                        <li><a href="contact.php">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">about</a></li>
                                        <li>
                                            <a href="product.php">Shop </a>
                                            <ul class="submenu">
                                            <?php foreach($cats as $cat) : ?>
                                                <li><a href="product.php?category=<?= $cat['id'] ?>"><?= $cat['name'] ?></a></li>
                                                <?php endforeach; ?>
                                                
                                            </ul>
                                        </li>
                                        
                                        <li><a href="blog.php">BLogs</a></li>
                                        <li><a href="contact.php">contact us</a></li>
                                    </ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>
       
        