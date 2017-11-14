<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Service | {{ $tampilkan->nama }}</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="{{{ asset('images/logo_small.png')}}}" type="image/x-icon">
	<link rel="stylesheet" href="{{{ asset('css/grid.css') }}}">
	<link rel="stylesheet" href="{{{ asset('css/style.css') }}}">
	<link rel="stylesheet" href="{{{ asset('css/touchTouch.css') }}}">
	<link rel="stylesheet" href="{{{ asset('css/camera.css')}}}">
	<link rel="stylesheet" href="{{{ asset('css/owl.carousel.css')}}}">

	<script src="{{{ asset('js/jquery.js') }}}"></script>
	<script src="{{{ asset('js/jquery-migrate-1.2.1.js') }}}"></script>
	<script src="{{{ asset('js/touchTouch.jquery.js') }}}"></script>
	<script src="{{{ asset('js/script.js') }}}"></script>	
	<script src="{{{ asset('js/camera.js')}}}"></script>
	<script src="{{{ asset('js/owl.carousel.js')}}}"></script>
	<script src="{{{ asset('js/jquery.stellar.js')}}}"></script>
	<script src="{{{ asset('js/script.js')}}}"></script>
	<script src="{{{ asset('js/jquery.mobile.customized.min.js')}}}"></script>
	<script src="{{{ asset('js/wow.js')}}}"></script>

	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}});
	</script>
	<script>
	jQuery(function(){
		jQuery('#camera_wrap').camera({
			height: '37.58333333333333%',
			thumbnails: false,
			pagination: true,
			fx: 'simpleFade',
			loader: 'none',
			hover: false,
			navigation: false,
			playPause: false,
			minHeight: "139px",
		});
	});
</script>
	<script src="{{{ asset('js/wow.js') }}}"></script>
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
	<script>            
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.crunchify-top').fadeIn(duration);
			} else {
				jQuery('.crunchify-top').fadeOut(duration);
			}
		});
 
		jQuery('.crunchify-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
	});
</script>
	</head>
<body class="index-2">
<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<h1 class="logoHead">					
					<a href="index.html"><img src="{{{ asset('./images/logo_big.png')}}}" class="logo-img"></a>					
				</h1>
					<nav>
						<ul class="sf-menu">
							<li><a href="{!! url('/') !!}">Home</a></li>
							<li><a href="{!! url('/abouts') !!}">About</a></li>
							<li><a href="{!! url('/news') !!}">News</a></li>
							<li class="current"><a href="{!! url('/services') !!}">Services</a></li>
							<li><a href="{!! url('/contacts') !!}">Contacts</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

<!--=======content================================-->

<section id="content">
	
		<div class="container" style="width:60%;">				
			<div class="row">
					<div class="itemshow block-center">
						<img src="{{ asset('images/product/'.$tampilkan->gambar)  }}"  style="width:100%;height:440px;" >
					</div>				
				<h5>{{ $tampilkan->nama }}.</h5>				
				<p style="text-indent: 50px; line-height: 1.5;"><?php
				echo nl2br("$tampilkan->keterangan");
				?>
				</p>
				<br/>		
		</div>
	</div>
</section>



<!--=======footer=================================-->
<footer id="footer">
	<div class="container">
			<div class="row">
			<a href="http://www.ubaya.ac.id">
				<img src="{{{ asset('./images/logoubaya.png')}}}" class="logobwh glyphicon glyphicon-chevron-up"></a>
				<div>
					<a href="#" class="crunchify-top "  title="back to top" style="display: inline; font-size:12pt;">TOP
					</a>
				</div>
			
		</div>
	</div>
	</div>
</footer>
</body>
</html>


