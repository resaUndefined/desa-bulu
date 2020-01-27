@extends('client.base')

@section('title', $dusun->desa)

@section('content')
<div id="page-wrapper">
<!-- Main -->
<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -70px;">
				<article id="main">
					<header style="text-align: left;">
						<h2>Dusun {{ $dusun->desa }}</h2>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Secara administratif Dusun Bulu terletak di Kelurahan Bejiharjo, Kecamatan Karangmojo, Kabupaten Gunungkidul. Wilayah Dusun Bulu terletak di daerah pegunungan dengan akses jalan sudah beraspal dan dicor. Di Dusun ini sudah terjangkau aliran listrik dari PLN dan sebagian besar penduduknya menggunakan sumur sebagai sumber pengairan. Adapun kondisi jarak rumah antar warga relatif dekat, jarak antar RT yang relatif dekat, kecuali RT 08 yang terpisahkan oleh perkebunan kayu putih.</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;">{{ $dusun->desa }} terbagi menjadi 1 RW dan terbagi menjadi {{ $rt }}, yaitu {{ $rtAwal->nama_rt }} - {{ $rtAkhir->nama_rt }}. Batas wilayahnya adalah sebagai berikut.</p>
						<table style="border: 0">
							@foreach ($batasDesa as $bd)
								<tr>
									<td><strong>{{ $bd->mata_angin }}</strong></td>
									<td>: {{ $bd->nama_batas }}</td>
								</tr>
							@endforeach
						</table>
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
						<h3>Fasilitas Dusun {{ $dusun->desa }}</h3>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Fasilitas yang terdapat di Dusun {{ $dusun->desa }}, Kelurahan Bejiharjo, Kecamatan Karangmojo, Kabupaten Gunungkidul antara lain sebagai berikut.</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: inherit;">
							<ol>
								@foreach ($fasilitas as $f)
									<li>{{ $f->nama_fasilitas }}</li>
								@endforeach
							</ol>
						</p>
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
						<h3>Kegiatan Rutin</h3>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Kegiatan masyarakat di Dusun Dusun {{ $dusun->desa }}, Kelurahan Bejiharjo, Kecamatan Karangmojo, Kabupaten Gunungkidul ini terdapat beberapa kegiatan rutin yang biasa dilaksanakan oleh masyarakat, antara lain:</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: inherit;">
							<ol>
								@foreach ($kegiatan as $k)
									<li>{{ $k->nama_kegiatan }}</li>
								@endforeach
							</ol>
						</p>
					</header>
				</article>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection