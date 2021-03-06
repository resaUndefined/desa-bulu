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
					<li><a href="{{ route('client') }}">Home</a></li>
					<li>
						<a href="#">About</a>
						<ul>
							<li><a href="{{ route('client.dusun') }}">Dusun Bulu</a></li>
							<li><a href="{{ route('client.data-dusun') }}">Data Dusun</a></li>
							<li><a href="{{ route('client.organisasi') }}">Data Pejabat dan Karang Taruna</a></li>
							<li><a href="{{ route('client.kampung-kb') }}">Kampung KB</a></li>
						</ul>
					</li>
					<li><a href="{{ route('client.destinasi') }}">Destinations</a></li>
					<li><a href="{{ route('client.event') }}">Events</a></li>
					<li><a href="{{ route('client.artikel') }}">Pojok Bulu</a></li>
					<li><a href="{{ route('client.galeri') }}">Galery</a></li>
					<li><a href="#cariPost" class="btn btn-success"><i class="fas fa-search"></i> Search</a></li>
					@if (Auth::check())
						<li><a href="{{ route('home') }}"><i class="fas fa-user"></i> Dashboard</a></li>
					@else
						<li><a href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a></li>
					@endif
				</ul>
			</nav>
			<br><br><br>
			@yield('content')
			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<!-- <hr /> -->
						<div class="row">
							<div class="col-12">

								<!-- Contact -->
									<section class="contact">
										<header>
											<h3>Dusun Bulu</h3>
										</header>
										<p>Tertarik berkunjung kesana ?</p>
										<ul class="icons">
											<li><a href="https://instagram.com/pesona_tapakjaran?igshid=134wxnti5m5e0" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>Develop By : KKN Dusun Bulu</li>
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
	<script async src="https://static.addtoany.com/menu/page.js"></script>
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
        	<form  method="post" action="{{ route('client.search') }}">
        		{{ csrf_field() }}
		       	<div class="row">
		       		<div class="form-group">
			     	</div>
		       	</div>
		       	<div class="row">
		       		<div class="form-group">
			      		<label>Masukkan Keyword</label>
    						<input type="text" class="form-control" id="keyword" name="keyword" placeholder="Pencarian" required="">
			     	</div>
		       	</div>
		       	<div class="row">
		       		<div class="form-group">
			      		<label>Kategori Pencarian</label>
			         	<select class="form-control" required="" name="kategori">
			            	<option value="">- Pilih Kategori -</option>
			            	<option value="1">Artikel</option>
			            	<option value="2">Destinasi</option>
			            	<option value="3">Event</option>
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
</script>
@yield('slider')
</html>