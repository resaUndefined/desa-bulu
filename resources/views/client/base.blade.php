<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ URL::asset('client/css/main.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('client/css/fontawesome-all.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('client/css/style.css') }}" />
		<noscript><link rel="stylesheet" href="{{ URL::asset('client/css/noscript.css') }}" /></noscript>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper" class="container-fluid">
			<nav id="nav" style="background-color: #1C0920;color: #fff;">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li>
						<a href="#">About</a>
						<ul>
							<li><a href="#">Desa 1</a></li>
							<li><a href="#">Desa 2</a></li>
							<li><a href="#">Desa 3</a></li>
						</ul>
					</li>
					<li><a href="#">Destinations</a></li>
					<li><a href="#">Events</a></li>
					<li><a href="#">Pojok Bulu</a></li>
					<li><a href="#">Galery</a></li>
					<li><a href="#cariPost" class="btn btn-success"><i class="fas fa-search"></i> Search</a></li>
					@if (Auth::check())
						<li><a href="{{ route('home') }}"><i class="fas fa-user"></i> Dashboard</a></li>
					@else
						<li><a href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a></li>
					@endif
				</ul>
			</nav>
			<br><br><br>
			<div class="row" style="background-color: #1C0920;">
				<div class="slideshow-container">
				<div class="mySlides fade">
				  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQKee5JkB6pRqBq-C4Cp_46FXvrWu6o07jqT7ssff3kxrLOCjd_" style="width:100%">
				  	<div class="text">Caption Text</div>
				</div>

				<div class="mySlides fade">
				  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTV1hWnvXpVtbNcw4t-2UAvD1sdAyU-2Onl6mx1JIJK4yDGmpcv" style="width:100%">
				  	<div class="text">Caption Two</div>
				</div>

				<div class="mySlides fade">
				  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width:100%">
				  	<div class="text">Caption Three</div>
				</div>
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
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
						</div>
						<!-- end destinations -->
						<!-- event -->
						<div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: -20px;">
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<a href="#" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" style="width: 100%;" /></a>
									<a href="#" ><p style="text-align: center; font-size: 12px;">Commodo id natoque malesuada sollicitudin elit suscipit magna.</p></a>
								</div>
							</div>
						</div>
					</div>
				</header>
			</section>

			<!-- Carousel -->
				<section class="carousel">
					<div class="reel">

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom" /></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

						<article>
							<a href="#" class="image featured zoom"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" data-toggle="tooltip" title="Ini adalah foto saat event bersih dusun" data-placement="bottom"/></a>
						</article>

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
							<div class="col-9 col-12-mobile special">
								<article>
								<a href="#" class="image featured"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /><h3 style="font-family: unset;">Artikel Hot nih</h3></a>
								<p style="margin-top:-30px;font-size: 14px;font-family: unset;">
									Mantap jiwa nih lagi ada artikel mantap jiwa nih wkwkwk
								</p>
							</article>
							</div>
							<div class="col-3 col-12-mobile special">
								<div class="col-12 col-12-mobile">
									<article style="height: 50%;margin-bottom: -30px;">
										<a href="#" class="image featured"><img style="width: 80%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /><p style="font-size: 14px;font-family: unset;">Artikel bagus</p></a>
									</article>
								</div>
								<div class="col-12 col-12-mobile">
									<article style="height: 50%;margin-bottom: -30px;">
										<a href="#" class="image featured"><img style="width: 80%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /><p style="font-size: 14px;font-family: unset;">Artikel keren</p></a>
									</article>
								</div>
								<div class="col-12 col-12-mobile">
									<article style="height: 50%;margin-bottom: -30px;">
										<a href="#" class="image featured"><img style="width: 80%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /><p style="font-size: 14px;font-family: unset;">Artikel trending</p></a>
									</article>
								</div>
							</div>
						</div>
					</section>

				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						
						<!-- <hr /> -->
						<div class="row">
							<div class="col-12">

								<!-- Contact -->
									<section class="contact">
										<header>
											<h3>Desa Bulu</h3>
										</header>
										<p>Tertarik berkunjung kesana ?</p>
										<ul class="icons">
											<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
											<!-- <li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li> -->
											<!-- <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li> -->
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>Develop By : <a href="http://html5up.net">KKN Desa Bulu</a></li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="{{ URL::asset('client/js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/jquery.dropotron.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/browser.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/breakpoints.min.js') }}"></script>
			<script src="{{ URL::asset('client/js/util.js') }}"></script>
			<script src="{{ URL::asset('client/js/main.js') }}"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<div class="modal fade" id="cariPost" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f2f2f2;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cari Postingan</h4>
        </div>
        <div class="modal-body">
        	<form  method="post">
        		<!-- {{ csrf_field() }} -->
		       	<div class="row">
		       		<div class="form-group">
			     	</div>
		       	</div>
		       	<div class="row">
		       		<div class="form-group">
			      		<label>Masukkan Keyword</label>
    						<input type="text" class="form-control" id="pencarianPost" placeholder="Pencarian">
			     	</div>
		       	</div>
		       	<div class="row">
		       		<div class="form-group">
			      		<label>Kategori Pencarian</label>
			         	<select class="form-control" required="" name="level">
			            	<option value="1">- Pilih Level -</option>
			            	<option value="2">- Pilih Level -</option>
			            	<option value="3">- Pilih Level -</option>
			         	</select>
			     	</div>
		       	</div>
		       	
       	</div>
        <div class="modal-footer">
        	<div class="row">
        		<div class="form-group col-md-3 col-sm-3 col-xs-6 pull-right">
	    			<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup Jendela</button>
	        	</div>
	        	<div class="form-group col-md-3 col-sm-3 col-xs-6 pull-right">
	    			<input type="submit" value="Cari" class="form-control btn btn-primary">
	      		</div>
        	</div>
        </div>
        </form>
      </div>
      
    </div>
  </div>

	</body>
	<script>
 $(document).ready(function() {
  $('.btn[href^="#"]').click(function(e){
    e.preventDefault();
    var href = $(this).attr('href');
    $(href).modal('toggle');
  });
  $('[data-toggle="tooltip"]').tooltip();
});

 var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
    </script>
    <!-- Latest compiled and minified JavaScript -->
</html>