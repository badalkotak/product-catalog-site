<?php

require_once("home_classes/Constants.php");
require_once("home_classes/DBConnect.php");

require_once("home_classes/Home.php");
require_once("home_classes/MainCategory.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$home = new Home($dbConnect->getInstance());
$category = new MainCategory($dbConnect->getInstance());

$getHome = $home->getHome();
// include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Golkunda</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->

    <!-- <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Merienda|Sacramento|Tangerine" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header3">
		<!-- Header desktop -->
		<div class="container-menu-header-v3">
			<div class="wrap_header3 p-t-20">
				<!-- Logo -->
				<a href="index.php" class="logo3">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Header Icon -->
				<div class="header-icons3 p-t-20 p-b-0 p-l-8">
					<!-- <a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a> -->

					<!-- <span class="linedivid1"></span> -->

					
				</div>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li class="sale-noti">
								<a class="m-text2" href="index.php" style="font-size: 28px">Home</a>
								<!-- <ul class="sub_menu">
									<li><a href="index.html">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li>
								</ul> -->
							</li>

							<li>
								<a class="m-text2" href="product.html">Products</a>
							</li>

							<li>
								<a class="m-text2" href="product.html">Events</a>
							</li>

							<li>
								<a class="m-text2" href="cart.html">Investor Corner</a>
							</li>

							<li>
								<a class="m-text2" href="about.html">Know us</a>
							</li>

							<li>
								<a class="m-text2" href="contact.html">Lets talk business</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<!-- <div class="bottombar flex-col-c p-b-65">
				<div class="bottombar-social t-center p-b-8">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>
			</div> -->
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile bgblack">
			<!-- Logo moblie -->
			<a href="home-03.html" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				

				<div class="btn-show-menu-mobile hamburger hamburger--spring">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu fontfamilycookie">
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-menu-mobile">
                        <a href="index.php"><label class="fontfamilycookie fs-30">Home</label></a>						
					</li>

					<li class="item-menu-mobile">
                        <a href="product.html"><label class="fontfamilycookie fs-30">Products</label></a>
					</li>

					<li class="item-menu-mobile">
                        <a href="product.html"><label class="fontfamilycookie fs-30 fs-30 fs-30 fs-30">Events</label></a>
					</li>

					<li class="item-menu-mobile">
                        <a href="cart.html"><label class="fontfamilycookie fs-30 fs-30 fs-30">Investor Corner</label></a>
					</li>

					<li class="item-menu-mobile">
                        <a href="about.html"><label class="fontfamilycookie fs-30 fs-30">Know us</label></a>
					</li>

					<li class="item-menu-mobile">
                        <a href="contact.html"><label class="fontfamilycookie fs-30">Lets talk business</label></a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

<div class="container1-page">
	<!-- Slide1 -->
	<section class="slide1 rs1-slick1">
		<div class="wrap-slick1">
			<div class="slick1">

			<?php
			if($getHome!=null)
			{
				while($row=$getHome->fetch_assoc())
				{
					$cover_image=$row['cover_image'];
					$title=$row['title'];
					$tag_line=$row['tag_line'];

					//Make Sliders
					echo '<div class="item-slick1 item1-slick1" style="background-image: url(backend/modules/manage_home_page/functions/home_images/'.$cover_image.');">
							<div class="wrap-content-slide1 size24 flex-col-c-m p-l-15 p-r-15 p-t-120 p-b-170">
								<h2 class="caption1-slide1 xl-text3 t-center bo15 p-b-3 animated visible-false m-b-25" data-appear="fadeInUp">
									'.$title.'
								</h2>

								<span class="caption2-slide1 m-text27 t-center animated visible-false m-b-30" data-appear="fadeInDown">
									'.$tag_line.'
								</span>

								<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
								</div>
							</div>
						</div>';
				}
			}
			?>

			</div>
		</div>
	</section>

	<!-- Top noti -->
	<!-- <div class="pos-relative">
		<div class="flex-c-m size22 bg0 s-text21 ab-b-l op-0-9">
			20% off everything!
			<a href="product.html" class="s-text22 hov6 p-l-5">
				Shop Now
			</a>

			<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
				<i class="fa fa-remove fs-13" aria-hidden="true"></i>
			</button>
		</div>
	</div> -->

	<!-- Banner -->
	<section class="banner bgblack p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<?php

				$getLayoutCat = $category->getCategoryWithLayout(1);
				if($getLayoutCat!=null)
				{
					while($row1=$getLayoutCat->fetch_assoc())
					{
						$name=$row1['name'];
						$cover_image=$row1['cover_image'];
						$tag_line=$row1['tag_line'];
						$cat_id=$row1['id'];
					}
					//LAYOUT:1
					echo '<div class="col-sm-10 col-md-8 col-lg-4">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="backend/modules/manage_category/functions/cover_images/'.$cover_image.'" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?cat_id='.$cat_id.'" class="flex-c-m size2 m-text2 bgtransparent hov1 trans-0-4">
								'.$name.'
							</a>
						</div>
					</div>';
				}
				$getLayoutCat2 = $category->getCategoryWithLayout(2);
				if($getLayoutCat2!=null)
				{
					while($row2=$getLayoutCat2->fetch_assoc())
					{
						$name=$row2['name'];
						$cover_image=$row2['cover_image'];
						$tag_line=$row2['tag_line'];
						$cat_id=$row2['id'];
					}
					//LAYOUT:2
					echo '<div style="width:720;height:660;" class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="backend/modules/manage_category/functions/cover_images/'.$cover_image.'" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?cat_id='.$cat_id.'" class="flex-c-m size2 m-text2 bgtransparent hov1 trans-0-4">
								'.$name.'
							</a>
						</div>
					</div>';
				}

				echo '</div>';

					
				$getLayoutCat3 = $category->getCategoryWithLayout(3);
				if($getLayoutCat3!=null)
				{
					while($row3=$getLayoutCat3->fetch_assoc())
					{
						$name=$row3['name'];
						$cover_image=$row3['cover_image'];
						$tag_line=$row3['tag_line'];
						$cat_id=$row3['id'];
					}

					//LAYOUT:3
					echo '<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="backend/modules/manage_category/functions/cover_images/'.$cover_image.'" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?cat_id='.$cat_id.'" class="flex-c-m size2 m-text2 bgtransparent hov1 trans-0-4">
								'.$name.'
							</a>
						</div>
					</div>';
				}

				$getLayoutCat4 = $category->getCategoryWithLayout(4);
				if($getLayoutCat4!=null)
				{
					while($row4=$getLayoutCat4->fetch_assoc())
					{
						$name=$row4['name'];
						$cover_image=$row4['cover_image'];
						$tag_line=$row4['tag_line'];
						$cat_id=$row4['id'];
					}

					echo '<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="backend/modules/manage_category/functions/cover_images/'.$cover_image.'" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?cat_id='.$cat_id.'" class="flex-c-m size2 m-text2 bgtransparent hov1 trans-0-4">
								'.$name.'
							</a>
						</div>
					</div>
				</div>';
				}

				$getLayoutCat5 = $category->getCategoryWithLayout(5);
				if($getLayoutCat4!=null)
				{
					while($row5=$getLayoutCat5->fetch_assoc())
					{
						$name=$row5['name'];
						$cover_image=$row5['cover_image'];
						$tag_line=$row5['tag_line'];
						$cat_id=$row5['id'];
					}

					echo '<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="backend/modules/manage_category/functions/cover_images/'.$cover_image.'" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?cat_id='.$cat_id.'" class="flex-c-m size2 m-text2 bgtransparent hov1 trans-0-4">
								'.$name.'
							</a> 
						</div>
					</div>';
				}
				?>

					<!-- block2 -->
					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="images/icons/bg-01.jpg" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								View More Products
							</h4>

							<p class="t-center w-size4">
								<!-- Be the frist to know about the latest fashion news and get exclu-sive offers -->
							</p>

							<div class="w-size2 p-t-25">
								<!-- Button -->
								<a href="product.php" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Explore More
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class=" p-t-45 p-b-43 p-l-65 p-r-65 p-lr-0-xl1" >
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon6">
				<h4 class="s-text12 p-b-30" style="color:white;">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size26" style="color:white;">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon7">
				<h4 class="s-text12 p-b-30" style="color:white;">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Sunglasses
						</a>
					</li>

				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon7">
				<h4 class="s-text12 p-b-30" style="color:white;">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Know us Better
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Lets Talk Business
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7 color1">
							Returns
						</a>
					</li>
				</ul>
			</div>

			
		</div>

		<div class="t-center p-l-15 p-r-15">
			

			<div class="t-center s-text8 p-t-20" style="color:white;">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" style="color:white;">Colorlib</a>
			</div>
		</div>
	</footer>
</div>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
