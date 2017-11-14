<!DOCTYPE html>
<html lang="en">
	<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="{{{ asset('images/logo_small.png')}}}" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="js/jquery.stellar.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<style type="text/css">
		*{
			font-family: 'Lato', sans-serif;;
		}
	</style>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="js/wow.js"></script>
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
	<script>
	$(document).ready(function() { 
			if ($('html').hasClass('desktop')) {
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 20,
					resposive: true,
					hideDistantElements: true,
				});
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
<body class="index-1">
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
							<li class="current"><a href="{!! url('/abouts') !!}">About</a></li>
							<li><a href="{!! url('/news') !!}">News</a></li>
							<li><a href="{!! url('/services') !!}">Services</a></li>
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
	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<p><h3>Visi dan Misi</h3></p>
					<h4></h4>
					<p style="text-align:center;color:black;">Menjadikan ULC sebagai "Center of exellence for services on language and communication skills training"<br>Menyediakan jasa/pelayanan yang bermutu damam bidang pelatihan bahasa dan keterampilang komunikasi bagi para pelanggan yakni civitas academica Universitas Surabaya dan masyarakat umum.</p>				
				</div>
			</div>
		</div> 
	</div>

	<div class="full-width-container block-2">
		<div class="container">			
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Sejarah</span></h2>
					</header>
						<p style="text-align:center;">Pusat Bahasa sebagai salah satu unit penunjang akademik dibentuk/didirikan pada 20 April 2004. Dari tahun 2000 sampai 2007, ULC merupakan salah satu ISS ( Institutional Support System) yang pengembangannya dibiayai dengan dana dari TPSDP. Dengan demikian sebagian besar sarana fisik dan SDM yang terlatih yang dimiliki ULC sekarang merupakan hasil dari program TPSDP tersebut.</p>
				</div>
			</div>
		</div>
	</div>




	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Staff Kami</span></h2>
					</header>
				
<div id="three-columns" class="grid-container grid_12" style="display:block;">
			<ul class="rig grid_12 columns-4">	
				{{-- */$x=0;/* --}}
				@foreach($datas as $data)
				{{-- */$x++;/* --}}	

					<div class="grid_1 alpha">
						<span class="element bd-ra">{{ $x }}</span>
					</div>
					
				<li>
					<img src="{{ asset('images/users/'.$data->photo) }} " />
					<h5>{!! $data->name !!}</h5>
					<p style="text-align:center;">{!! $data->admin !!}</p>
				</li>

					
			
				@endforeach
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
				<img src="./images/logoubaya.png" class="logobwh">
			</a>
			<div>
	<a href="#" class="crunchify-top "  title="back to top" style="display: inline; font-size:12pt;">TOP
					</a>
</div>
		</div>
	</div>
</footer>

</body>
</html>