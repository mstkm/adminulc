<!DOCTYPE html>
<html lang="en">
	<head>
	<title>News</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="{{{ asset('images/logo_small.png')}}}" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/camera.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src='js/camera.js'></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.stellar.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<style type="text/css">
		*{
			font-family: 'Lato', sans-serif;;
		}
	</style>
	<script src="js/script.js"></script>
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


<style type="text/css">
	</style>
	</head>
<body class="index">
<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
				<h1 class="logoHead">					
					<a href=""><img src="./images/LOGO.png" class="logo-img">
					</h1></a>					
					<nav>
						<ul class="sf-menu">
							<li><a href="{!! url('/') !!}">Home</a></li>
							<li><a href="{!! url('/abouts') !!}">About</a></li>
							<li class="current"><a href="{!! url('/news') !!}">News</a></li>
							<li><a href="{!! url('/services') !!}">Services</a></li>
							<li><a href="{!! url('/contacts') !!}">Contacts</a></li>
						</ul>
					</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!--=======content================================-->

<section id="content">
	<div class="container">

		<div class="camera_container">
			<div id="camera_wrap">
				@foreach($datas as $data)
				<div class="item" data-src="{{ asset('images/post/'.$data->gambar) }}" width="100%" height="452px">
					<div class="camera_caption fadeIn">
						<a href="{{ url('news', $data->slug_judul) }}"><h4>{!!substr($data->judul,0,36)!!}</h4></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	</div>
	<div class="full-width-container block-5">
		<div class="container">
			<div class="grid_12">
				<div id="three-columns" class="grid-container" style="display:block;">
					<ul class="rig columns-4">
						@foreach($datas as $data)		
						<li>
							<img src="{{ asset('images/post/'.$data->gambar) }}" />
							<a href="{{ url('news', $data->slug_judul) }}"><h5>{!!substr($data->judul,0,40)!!}...</h5></a>
							<p style="line-height: 1.6;">{!!substr($data->isi,0,150)!!}...</p>
						</li>		
						@endforeach		
					</ul>
				</div>
				<div class="center">
					<ul class="pagination">
					  {!! $datas->render()!!}
					</ul>			
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