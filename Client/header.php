<?php
if (isset($_POST["dangxuat"])) {
	unset($_SESSION["user"]);
	header("Location: index.php");
}
?>
<style>
	.logo h2 {
		color: white;
	}
</style>

<!-- Mirrored from html.kutethemes.com/boutique/html/index9.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Nov 2023 04:33:46 GMT -->

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/chosen.css">

<link rel="stylesheet" type="text/css" href="/css/lightbox.min.css">

<link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">

<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/form.css">

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel='stylesheet' type='text/css'
	href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic'>

<link rel='stylesheet' type='text/css'
	href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic'>

<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Oswald:400,300,700'>

<title>ROLEX</title>

<body class="home">
	<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
		<div class="box-inner">
			<span class="close-menu"><span class="icon pe-7s-close"></span></span>
		</div>
	</div>
	<div id="header-ontop" class="is-sticky"></div>
	<header id="header" class="header style2 style9">
		<div class="main-header">
			<div class="container">
				<div class="main-menu-wapper">
					<div class="row">
						<div class="col-sm-12 col-md-2">
							<div class="logo">
								<a href="index.php"><H2>Rolex</H2></a>
							</div>
						</div>

						<div class="col-sm-12 col-md-10">
							<div class="box-control">

								<form action="index.php?act=sanpham" method="post" class="box-search show-icon">

									<span class="icon">
										<span class="pe-7s-search"></span>
									</span>

									<div class="inner">
										<input type="text" class="search" placeholder="Tìm kiếm..." name="kyw" required>
										<button class="button-search" name="timkiem"><span class="pe-7s-search"></span></button>
									</div>
								</form>
								<div class="mini-cart">
									<a class="cart-link" href="index.php?act=addgiohang"><span class="pe-7s-cart"></a>

								</div>
								<div class="box-settings">
									<span class="icon pe-7s-config" style="margin-bottom: 9px;"></span>
									<div class="settings-wrapper ">
										<div class="setting-content">
											<?php ob_start();
											if (isset($_SESSION["user"])) {
												extract($_SESSION['user']);
												$linktk = 'index.php?act=tkcanhan';
												$linkadmin = '../Admin/index.php';

												echo '
												<div class="setting-option">
													<ul>
													    <p> Xin chào ' . $nguoidung . '</p>
														<form action="" method="post">
														<a href="'.$linktk.'"><p>Trang cá nhân</p></a>';
														
												if($id_role == 1 || $id_role == 2){
													$linkadmin = '../Admin/index.php';
													echo '<a href="'.$linkadmin.'"><p>Trang Quản Lý</p></a>';
												}
												echo '
														<br>
														<input type="submit" name="dangxuat" value="Đăng xuất">
														</form>
													</ul>
											 	</div> ';
												
											} else {
												echo '
													<div class="setting-option">
													<ul>
														<li><a href="index.php?act=dangky"><span> Đăng ký</span></a>
														</li>
														<li><a href="index.php?act=dangnhap"></i><span> Đăng nhập</span></a>
														</li>
													</ul>
												</div>';
												ob_end_flush();
											}
											?>
										</div>
									</div>
								</div>
							</div>

							<ul class="boutique-nav main-menu clone-main-menu">
								<li class="menu-item-has-children item-megamenu">
									<a href="index.php">HOME</a>
								</li>
								<li class="menu-item-has-children item-megamenu">
									<a href="index.php?act=sanpham">SHOP</a>
								</li>
								<li class="menu-item-has-children item-megamenu">
									<a href="index.php?act=lienhe">LIÊN HỆ</a>
								</li>
								<li class="menu-item-has-children">
									<a href="index.php?act=about">ABOUT</a>
								</li>
							</ul>
							<span class="mobile-navigation"><i class="fa fa-bars"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</header>