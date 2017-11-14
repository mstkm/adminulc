<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="{{{ asset('images/logo_small.png')}}}" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/contact-form.css">
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="js/script.js"></script>
	<script src='//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false'></script>
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
<body class="index-4">
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
							<li><a href="{!! url('/services') !!}">Services</a></li>
							<li class="current"><a href="{!! url('/contacts') !!}">Contacts</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2 style="text-align:center;"><span>Lokasi Kami</span></h2>
					</header>
					<div class="content_map">
						<div class="google-map-api"> 
							<div id="map-canvas" class="gmap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.326618864069!2d112.76793762916452!3d-7.3194294694931115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae38bf4589d%3A0xf14445b17f5f7e5!2sUbaya+Language+Center!5e0!3m2!1sen!2sid!4v1471717395438" width="100%" height="430" frameborder="0" style="border:0" allowfullscreen></iframe>							
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<div>
						<hader>
							<h2><span>Informasi</span></h2>
						</hader>
						<p class="el-1">
							Pusat Bahasa atau yang lebih dikenal dengan nama ULC (Ubaya Language Center) adalah salah satu unit penunjang akademik Universitas Surabaya dengan misi ” menyediakan jasa/pelayanan yang bermutu dalam bidang pelatihan bahasa dan keterampilan berkomunikasi bagi para pelanggannya yaitu civitas academica Ubaya dan masyarakat umum. 
						</p>
						<p class="el-1">Visi ULC adalah menjadikan ULC sebagai ”Center of Excellence for Services in Language and Communication Skills Training”. Untuk mencapai misinya ini, ULC didukung oleh staf pengajar yang berkualitas, fasilitas yang memadai dan suasana akademik yang menyenangkan.</p>
						</div>
					<div class="grid_3 alpha">
						<div class="address">
							<p>Ubaya Language Center. <br>Jl Raya Kalirungkut, <br>Gedung PF, Lantai 4.</p>
						</div>
					</div>
					<div class="grid_3">
						<div class="address">
							<p>Telephone: (+6231) 298-1388 <br>HP :+62857.3301.1417 <br>E-mail: ulc@ubaya.ac.id & ulc@staff.ubaya.ac.id</p>
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
<script type="text/javascript">
	new GMaps({
  	div: '#map',
  	lat: -12.043333,
  	lng: -77.028333
	});

</script>
</body>
</html>