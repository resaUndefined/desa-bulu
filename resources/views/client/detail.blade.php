@extends('client.base')

@section('title', $data->judul)

@section('content')
<div id="page-wrapper">
			<!-- Main -->
				<div class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-12 col-12-mobile imp-mobile" id="content">
								<article id="main">
									<header style="text-align: left;">
										<h2><a href="{{ $rute }}">{{ $data->kategori }}</a></h2>
										<p style="margin-bottom: -3px;font-family: unset;font-weight: bold;">
											{{ $data->judul }}
										</p>
										<p style="display: block;font-size: 0.8em;margin: 0 0 0 1;line-height: 0.5em;text-align: inherit;"><strong>{{ $data->author }}</strong>, {{ date('d F Y', strtotime($data->tgl)) }}</p>
									</header>
									<a href="#" class="image featured"><img src="{{ url('/images/'.$data->gambar) }}" alt="" /></a>
									<p style="margin-top: -10px;">
										{!! $data->isi !!}
									</p>
								</article>
							</div>
						</div>
						<br><p style="font-family: unset;font-weight: bold;">Bagikan</p>
						<!-- AddToAny BEGIN -->
						<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_whatsapp"></a>
						</div>
						<!-- AddToAny END -->
						<hr />
						<h3 style="font-family: unset;font-weight: bold;">{{ $data->kategori }} yang lain</h3><br>
						<div class="row">
							@if (count($relatedData) > 0)
								@foreach ($relatedData as $rd)
									<article class="col-4 col-12-mobile special">
										<a href="{{ route('client.detail', $rd->id) }}" class="image featured"><img src="{{ url('/images/'.$rd->gambar) }}" alt="" /></a>
										<header>
											<h3 style="text-align: left;margin-top: -30px;font-family: unset;"><a href="{{ route('client.detail', $rd->id) }}">{{ $rd->judul }}</a></h3>
											<p style="display: block;font-size: 0.8em;margin: 0 0 0 1;line-height: 0.5em;text-align: left;"><strong>{{ $rd->author }}</strong>, {{ date('d F Y', strtotime($rd->tgl)) }}</p>
										</header>
									</article>
								@endforeach
							@endif
						</div>
					</div>

				</div>
@endsection