@extends('client.base')

@section('title', 'Artikel')

@section('content')
<div id="page-wrapper">
<!-- Main -->
	<div class="wrapper style1">
		<div class="container">
			<h3 style="text-align: center;font-family: unset;font-weight: bold;margin-top: -30px;margin-bottom: -35px;">Hasil Pencarian</h3>
			<hr />
			@if (count($resultSearch) > 0)
			<div class="row">
				@foreach ($resultSearch as $e)
					<article class="col-4 col-12-mobile special">
						<a href="{{ route('client.detail', $e->id) }}" class="image featured"><img src="{{ url('/images/'.$e->gambar) }}" alt="" /></a>
							<h3 style="font-family: unset;margin-top: -25px;margin-bottom: 10px;"><a href="{{ route('client.detail', $e->id) }}">{{ $e->judul }}</a></h3>
					</article>
				@endforeach
			</div>
			@else
				<div class="row">
					<h3>Maaf {{ $nama }} tidak ditemukan</h3>
				</div>
			@endif
		</div>
	</div>
@endsection