@extends('client.base')

@section('title', 'Data Pejabat Dusun')

@section('content')
<div id="page-wrapper">
<!-- Main -->
<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -60px;">
				<article id="main">
					<header style="text-align: left;">
						<h2>Data Pejabat Dusun {{ $dusun->desa }}</h2>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Administratif Dusun {{ $dusun->desa }}, Kelurahan Bejiharjo, Kecamatan Karangmojo, Kabupaten Gunungkidul dikepalai oleh Kepala Dukuh dan membawahi {{ count($rt) }} RT dengan rincian sebagai berikut:</p>
						<center><table class="table table-hover table-responsive">
							<tr>
								<td class="col-md-3"><strong>Kepala Dukuh</strong></td>
								<td>: {{ $dusun->kepala_dukuh }}</td>
							</tr>
							<tr>
								<td class="col-md-3"><strong>Ketua RW</strong></td>
								<td>: {{ $dusun->ketua_rw }}</td>
							</tr>
							<tr>
								<td class="col-md-3"><strong>Ketua PKK</strong></td>
								<td>: {{ $dusun->ketua_pkk }}</td>
							</tr>
							@foreach ($rt as $bd)
								<tr>
									<td class="col-md-3"><strong>{{ $bd->nama_rt }}</strong></td>
									<td>: {{ $bd->ketua_rt }}</td>
								</tr>
							@endforeach
						</table></center>
					</header>
				</article>
			</div>
		</div>
		</div>
		<hr />
		<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -70px;margin-top: -20px;">
				<article id="main">
					<header style="text-align: left;">
						<h3 style="text-align: center;">Data Karang Taruna</h3>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;"><strong>{{ $karangTaruna[0]->karang_taruna }}</strong></p>
						<center>
							<table class="table table-hover table-responsive">
								@foreach ($kartaBule as $bd)
									<tr>
										<td class="col-md-3"><strong>{{ $bd->jabatan }}</strong></td>
										<td>: {{ $bd->pejabat }}</td>
									</tr>
								@endforeach
							</table>
						</center>
					</header>
				</article>
			</div>
		</div>
		</div>
		<hr />
		<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -70px;margin-top: -20px;">
				<article id="main">
					<header style="text-align: left;">
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;"><strong>{{ $karangTaruna[1]->karang_taruna }}</strong></p>
						<center>
							<table class="table table-hover table-responsive">
								@foreach ($bukid as $bd)
									<tr>
										<td class="col-md-3"><strong>{{ $bd->jabatan }}</strong></td>
										<td>: {{ $bd->pejabat }}</td>
									</tr>
								@endforeach
							</table>
						</center>
					</header>
				</article>
			</div>
		</div>
		</div>
		<hr />
		<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -50px;margin-top: -20px;">
				<article id="main">
					<header style="text-align: left;">
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;"><strong>{{ $karangTaruna[2]->karang_taruna }}</strong></p>
						<center>
							<table class="table table-hover table-responsive">
								@foreach ($rembulan as $bd)
									<tr>
										<td class="col-md-3"><strong>{{ $bd->jabatan }}</strong></td>
										<td>: {{ $bd->pejabat }}</td>
									</tr>
								@endforeach
							</table>
						</center>
					</header>
				</article>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection