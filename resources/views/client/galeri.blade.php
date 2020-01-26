@extends('client.base')

@section('title', 'Dusun Bulu')

@section('content')
<div id="page-wrapper">

			<!-- Main -->
				<div class="wrapper style1">

					<div class="container">
						<h3 style="text-align: center;font-family: unset;font-weight: bold;margin-top: -30px;margin-bottom: -35px;">Galery di Dusun Bulu</h3>
						<hr />
						@if (count($galeri) > 0)
						<div class="row">
							@foreach ($galeri as $e)
								<article class="col-4 col-12-mobile special">
									<a href="#" class="image featured"><img src="{{ url('/images/'.$e->gambar) }}" alt="" /></a>
										<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="#">{{ $e->caption }}</a></h3>
								</article>
							@endforeach
						</div>
							{{-- pagination --}}
							<br><br>
			              <div class="row" style="text-align: center;">
			                <div class="col-lg-12 col-md-12 col-sm-12">
			                  <div>Menampilkan {{ $galeri->firstItem() }} sampai {{ $galeri->lastItem() }} dari total {{ $galeri->total() }} galeri</div>
			                </div>
			              </div>
			              <br>
			              <div class="row" style="text-align: center;">
			                <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
			                  <div style="margin-top: -25px; margin-bottom: -15px;" class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
			                      {{ $galeri->links() }}
			                    </div>
			                </div>
			              </div>
			              {{-- end pagination --}}
						@else
							<div class="row">
								<article class="col-4 col-12-mobile special">
									<a href="#" class="image featured"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /></a>
									<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="#">Lorem Ipsum</a></h3>
								</article>
								<article class="col-4 col-12-mobile special">
									<a href="#" class="image featured"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /></a>
									<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="#">Lorem Ipsum</a></h3>
								</article>
								<article class="col-4 col-12-mobile special">
									<a href="#" class="image featured"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /></a>
									<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="#">Lorem Ipsum</a></h3>
								</article>
								<article class="col-4 col-12-mobile special">
									<a href="#" class="image featured"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-iMooleyiHmQtH8KRI27DObun2J4F34M_JSknMXwMbGA8ml3O" alt="" /></a>
									<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="#">Lorem Ipsum</a></h3>
								</article>
							</div>
						@endif
					</div>
				</div>
@endsection