<!DOCTYPE html>
<html lang="en">
<head>
<title>Little Closet</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/bootstrap-4.1.2/bootstrap.min.css')}}">
<link href="{{asset('ui-toko/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/responsive.css')}}">
@yield('head')
</head>
<body>

<!-- Menu -->

<div class="menu">
	<?php $cart = session()->get('cart'); $total = 0;?>
	@if (!empty($cart))
		@foreach ($cart as $item)
			<?php $total++?>
		@endforeach
	@endif
	
	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="{{asset('ui-toko/images/search.png')}}" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="#">Women</a></li>
			<li><a href="#">Men</a></li>
			<li><a href="#">Kids</a></li>
			<li><a href="{{route('home')}}">Home Deco</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="{{asset('ui-toko/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 912-252-7350</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="{{asset('ui-toko/images/logo_1.png')}}" alt=""></div>
						<div>Pondok Kampuh</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Produk</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="{{asset('ui-toko/images/search.png')}}" alt=""></button>
					</form>
				</div>
				<!-- User -->
				<div class="user"><a href="#"><div><img src="{{asset('ui-toko/images/user.svg')}}" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
				<!-- Cart -->
				<div class="user"><a href="{{route('cart')}}"><div><img class="svg" src="{{asset('ui-toko/images/cart.svg')}}" alt="https://www.flaticon.com/authors/freepik"><div>{{$total}}</div></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="{{asset('ui-toko/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+1 912-252-7350</div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		@yield('content')

		<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">
						
						<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><img src="{{asset('ui-toko/images/logo_2.png')}}" alt=""></div>
											<div>Pondok Kampuh</div>
										</div>
									</a>		
								</div>
								<div class="footer_about_text">
									<p>Selamat berbelanja di toko kami yang di jamin produk yg di jual disini lebih murah dan selalu terupdate, anda pun dapat memesan dengan menghungi kami melelau kontak yang disediakan</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Stay in Touch</div>
								<div class="newsletter">
									<form action="#" id="newsletter_form" class="newsletter_form">
										<input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">
										<button class="newsletter_button">+</button>
									</form>
								</div>
							</div>
						</div>

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							{{--  <div class="footer_contact">  --}}
								<div class="footer_menu">
									<div class="footer_title">Social</div>
									<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							{{--  </div>  --}}
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</div>
								<nav class="footer_nav ml-md-auto order-md-2 order-1">
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<li><a href="category.html">Home</a></li>
										<li><a href="category.html">Produk</a></li>
										<li><a href="category.html">Konatk</a></li>
										<li><a href="category.html">About Deco</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>

<script src="{{asset('ui-toko/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('ui-toko/styles/bootstrap-4.1.2/popper.js')}}"></script>
<script src="{{asset('ui-toko/styles/bootstrap-4.1.2/bootstrap.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('ui-toko/plugins/easing/easing.js')}}"></script>
<script src="{{asset('ui-toko/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('ui-toko/plugins/autoNumeric/autoNumeric.js')}}"></script>
<script src="{{asset('ui-toko/plugins/progressbar/progressbar.min.js')}}"></script>
@yield('footer')
</body>
</html>