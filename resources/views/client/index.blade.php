@extends('client.base')

@section('title', 'Dusun Bulu')

@section('content')
<div class="row" style="background-color: #1C0920;">
	<div class="slideshow-container">
		@if (count($slider) > 0)
			@foreach ($slider as $s)
				<div class="mySlides fade">
				  	<a href="{{ route('client.detail', $s->id) }}"><img src="{{ url('/images/'.$s->gambar) }}" style="width:100%"></a>
				  	<div class="text"><h2 style="color: #fff;font-weight: bold;text-align: center;font-family: unset;vertical-align: middle;">{{ $s->judul }}</h2></div>
				</div>
			@endforeach
		@else
			@for ($i = 0; $i <3 ; $i++)
				<div class="mySlides fade">
				  	<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width:100%"></a>
				  	<div class="text"><h2 style="color: #fff;font-weight: bold;text-align: center;font-family: unset;vertical-align: middle;">Default Slider</h2></div>
				</div>
			@endfor
		@endif
	</div>
	<br>
</div>
<section id="banner">
	<header>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h3 style="text-align: left;float: left;padding-bottom: 30px;margin-top: -30px;padding-left: 10px;">Destinations</h3>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h3 style="text-align: left;float: left;padding-bottom: 30px;margin-top: -30px;">Events</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				@if (count($destinasi) > 0)
					@foreach ($destinasi as $d)
						<div class="col-md-4">
							<div>
								<a href="{{ route('client.detail', $d->id) }}" ><img src="{{ url('/images/'.$d->gambar) }}" style="width: 100%;" /></a>
								<a href="{{ route('client.detail', $d->id) }}" ><p style="text-align: center; font-size: 15px;">{{ $d->judul }}</p></a>
							</div>
						</div>
					@endforeach
				@else
					@for ($i = 0; $i <3 ; $i++)
						<div class="col-md-4">
							<div>
								<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
								<a href="#" ><p style="text-align: center; font-size: 15px;">Default Destinasi</p></a>
							</div>
						</div>
					@endfor
				@endif
			</div>
			<!-- end destinations -->
			<!-- event -->
			<div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: -20px;">
				@if (count($event) > 0)
					@foreach ($event as $e)
						<div class="col-md-4">
							<div>
								<a href="{{ route('client.detail', $e->id) }}" ><img src="{{ url('/images/'.$e->gambar) }}" style="width: 100%;" /></a>
								<a href="{{ route('client.detail', $e->id) }}" ><p style="text-align: center; font-size: 15px;">{{ $e->judul }}</p></a>
							</div>
						</div>
					@endforeach
				@else
					@for ($i = 0; $i <3 ; $i++)
						<div class="col-md-4">
							<div>
								<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
								<a href="#" ><p style="text-align: center; font-size: 15px;">Default Event</p></a>
							</div>
						</div>
					@endfor
				@endif
			</div>
		</div>
	</header>
	</section>

	<!-- Carousel -->
	<section class="carousel">
		<div class="reel">
			@if (count($galeri) > 0)
				@foreach ($galeri as $g)
					<article>
						<a href="#" class="image featured zoom"><img src="{{ url('/images/'.$g->gambar) }}" alt="" data-toggle="tooltip" title="{{ $g->caption }}" data-placement="bottom" /></a>
					</article>
				@endforeach
			@else
				@for ($i = 0; $i <6 ; $i++)
					<article>
						<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Default Galery" data-placement="bottom" /></a>
					</article>
				@endfor
			@endif
		</div>
	</section>

	<!-- Main -->
	<div class="wrapper" style="margin-top: 10px;">

		<article id="main" class="container special" style="margin-bottom: -50px;text-align: center;">
			<h3 style="padding-top: -20px;padding-bottom: 20px;font-family: unset;text-align: left;font-weight: bold; ">Lokasi Desa Bulu</h3>
			<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=Bulu%2C%20Bejiharjo%2C%20Karangmojo%2C%20Gunung%20Kidul%2C%20Yogyakarta%2055891%2C%20Indonesia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;}</style></div>
		</article>

	</div>

	<!-- Features -->
	<div class="wrapper style1">
		<section id="features" class="container special">
			<header>
				<h2 style="text-align: left;font-family: unset;">Artikel</h2>
			</header>
			<div class="row">
				@if (!is_null($artikelNew))
					<div class="col-9 col-12-mobile special">
						<article>
						<a href="{{ route('client.detail', $artikelNew->id) }}" class="image featured"><img src="{{ url('/images/'.$artikelNew->gambar) }}" alt="" /><h3 style="font-family: unset;">{{ $artikelNew->judul }}</h3></a>
						</article>
					</div>
					<div class="col-3 col-12-mobile special">
						@foreach ($artikel as $a)
							<div class="col-12 col-12-mobile">
								<article style="height: 50%;margin-bottom: -30px;">
									<a href="{{ route('client.detail', $a->id) }}" class="image featured"><img style="width: 80%;" src="{{ url('/images/'.$a->gambar) }}" alt="" /><p style="font-size: 14px;font-family: unset;font-weight: bold;">{{ $a->judul }}</p></a>
								</article>
							</div>
						@endforeach
					</div>
				@else
					<div class="col-9 col-12-mobile special">
						<article>
						<a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /><h3 style="font-family: cursive;">Artikel Hot nih</h3></a>
						<p style="margin-top:-30px;font-size: 14px;font-family: cursive;">
							Default Newest Artikel
						</p>
					</article>
					</div>
					<div class="col-3 col-12-mobile special">
						<div class="col-12 col-12-mobile">
							<article style="height: 50%;margin-bottom: -30px;">
								<a href="#" class="image featured"><img style="width: 80%;" src="images/pic08.jpg" alt="" /><p style="font-size: 14px;font-family: cursive;">Default new Artikel</p></a>
							</article>
						</div>
						<div class="col-12 col-12-mobile">
							<article style="height: 50%;margin-bottom: -30px;">
								<a href="#" class="image featured"><img style="width: 80%;" src="images/pic08.jpg" alt="" /><p style="font-size: 14px;font-family: cursive;">Default new Artikel</p></a>
							</article>
						</div>
						<div class="col-12 col-12-mobile">
							<article style="height: 50%;margin-bottom: -30px;">
								<a href="#" class="image featured"><img style="width: 80%;" src="images/pic08.jpg" alt="" /><p style="font-size: 14px;font-family: cursive;">Default new Artikel</p></a>
							</article>
						</div>
					</div>
				@endif
			</div>
		</section>
	</div>
@endsection
@section('slider')
<script>
 	var slideIndex = 0;
	showSlides();

	function showSlides() {
	  	var i;
	  	var slides = document.getElementsByClassName("mySlides");
	  	for (i = 0; i < slides.length; i++) {
	    	slides[i].style.display = "none";
	  	}
	  	slideIndex++;
	  	if (slideIndex > slides.length) {
	  		slideIndex = 1
	  	}
	  	slides[slideIndex-1].style.display = "block";
	  	setTimeout(showSlides, 3000);
	}
</script>
@endsection