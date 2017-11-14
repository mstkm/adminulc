<!DOCTYPE html>
<html lang="en">
	<head>
	<title>UBAYA LANGUAGE CENTER</title>
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
	<script src="js/script.js"></script>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/wow.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<style type="text/css">
		*{
			font-family: 'Lato', sans-serif;;
		}
	</style>
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
	</head>
<body class="index">
<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
				<h1 class="logoHead">					
					<a href=""><img src="./images/logo_big.png" class="logo-img">
					</h1></a>					
					<nav>
						<ul class="sf-menu">
							<li class="current"><a href="{!! url('/') !!}">Home</a></li>
							<li><a href="{!! url('/abouts') !!}">About</a></li>
							<li><a href="{!! url('/news') !!}">News</a></li>
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
	<div class="full-width-container block-1">

		<div class="camera_container">
			<div id="camera_wrap">
				@foreach($datas as $data)
				<div class="item" data-src="{{ asset('images/post/'.$data->gambar) }}" >
					
					<div class="camera_caption fadeIn">
						<a href="{{ url('news', $data->slug_judul) }}"><h4>{!!substr($data->judul,0,46)!!}</h4></a>
					</div>
				</div>
				@endforeach
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
					<a href="{{ url('news', $data->slug_judul) }}"><h5>{!!$data->judul!!}</h5></a>
					<p style="line-height: 1.6;">{!!substr($data->isi,0,150)!!}...</p>
				</li>
		
				@endforeach		
					</ul>
		</div>
				
				<div class="grid_12">
					<a href="{!! url('/news') !!}"class="btn">more</a>
				</div>
			</div>
			</div>
		</div>
	</div>
		
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Tentang Kami</span></h2>
					</header>
					<p><h3>Visi dan Misi</h3></p>
					<h4></h4>
					<p style="color:black;">Meningkatkan kemampuan bahasa Inggris bagi para mahasiswa, dosen dan karyawan Ubaya dalam mewujudkan cita-cita Ubaya menjadi ” the world class university”.
Meningkatkan mutu PBM(Proses Belajar Mengajar) bahasa melalui pengembangan mutu staf dosen, rancangan bahan ajar dan peningkatan teknik mengajar.
Memotivasi civitas academica Ubaya untuk belajar bahasa asing.
Menyediakan layanan bahasa lain selain bahasa Inggris kepada civitas academica Ubaya dan masyarakat umum.</p>
					<a href="{!! url('/abouts') !!}" class="btn">Lagi</a>
				</div>
			</div>
		</div>
	</div>

	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Layanan</span></h2>
					</header>





							<div id="three-columns" class="grid-container" style="display:block;">
			<ul class="rig columns-3">



		
				<li>
					<img src="./images/england.jpg" />
					<h5>Bahasa Ingggris</h5>
				</li>
				<li>
					<img src="./images/china.jpg" />
					<h5>Bahasa Mandarin</h5>
				</li>
				<li>
					<img src="./images/korea.jpg" />
					<h5>Bahasa Korea</h5>
				</li>

					</ul>
		</div>

				</div>
				
				<a href="{!! url('/services') !!}" class="btn">More</a>
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