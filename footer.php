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
