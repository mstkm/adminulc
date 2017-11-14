<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Services</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="{{{ asset('images/logo_small.png')}}}" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<style type="text/css">
		*{
			font-family: 'Lato', sans-serif;;
		}
	</style>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/wow.js"></script>
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
<body class="index-3">
<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<h1 class="logoHead">
					
					<a href="index.html"><img src="./images/logo_big.png" class="logo-img"></a>					
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
	<div class="container">
		<div class="row">			
				<h2><span>Layanan Kami</span></h2>			
	<div class="grid_12">
			<div class="row">
				<div class="grid_12">
					<div id="three-columns" class="grid-container" style="display:block;">
			<ul class="rig columns-3">
				@foreach($datas as $data)


		
				<li>
					<img src="{{ asset('images/product/'.$data->gambar) }}" />
					<a href="{{ url('services', $data->slug_nama) }}"><h5>{!!$data->nama!!}</h5></a>
					<p style="line-height: 1.6;">{!!substr($data->keterangan,0,150)!!}...</p>
				</li>
		
				@endforeach		
					</ul>
		</div>		
			</div>
		</div>
	</div>


		</div>
	</div>
</div>
	
</section>

<!--=======footer=================================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<a href="http://www.ubaya.ac.id">
				<img src="./images/logoubaya.png" class="logobwh"></a>
				<div>
	<a href="#" class="crunchify-top "  title="back to top" style="display: inline; font-size:12pt;">TOP
					</a>
</div>
			

		</div>
	</div>
</footer>
</body>
</html>
