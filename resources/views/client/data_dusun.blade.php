@extends('client.base')

@section('title', 'Data Dusun')

@section('content')
<div id="page-wrapper">
<!-- Main -->
<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -70px;">
				<article id="main">
					<header style="text-align: left;">
						<h2>Data Dusun</h2>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Kondisi alam Dusun Bulu, Kelurahan Bejiharjo, Kecamatan Karangmojo, Kabupaten Gunungkidul sebagian besar merupakan lahan perkebunan kayu putih, lahan pertanian, pemukiman dan lahan terbuka. Jumlah Kepala Keluarga (KK) aktif saat ini sebanyak {{ $jumKK }} KK dengan rincian sebagai berikut:</p>
						<table style="border: 0;width: 30%;">
							@foreach ($rt as $bd)
								<tr>
									<td style="text-align: center;"><strong>{{ $bd->nama_rt }}</strong></td>
									<td>: {{ $bd->jml_kk }} KK</td>
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
						<h3>Klasifikasi Masyarakat berdasarkan umur</h3>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Masyarakat Dusun {{ $dusun->desa }} didominasi oleh usia 60 tahun ke atas. Jumlah penduduk Dusun Bulu relatif seimbang di semua usia. Berikut merupakan data usia masyarakat Dusun {{ $dusun->desa }}:</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: center;font-weight: bold;">
							Tabel 1. Data Usia Masyarakat Dusun Bulu
						</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: center;font-weight: bold;">
							<center><table class="table table-bordered table-responsive" style="width: 70%;">
								<thead>
									<tr>
										<th rowspan="2" style="text-align: center;vertical-align: middle;" class="col-md-1">No</th>
										<th rowspan="2" style="text-align: center;vertical-align: middle;">Klasifikasi</th>
										<th colspan="2" style="text-align: center;">Jumlah</th>
										<tr>
											<th style="text-align: center;">Laki-Laki</th>
											<th style="text-align: center;">Perempuan</th>
										</tr>
									</tr>
								</thead>
								<tbody>
									@foreach ($masyarakat as $key => $m)
										<tr style="text-align: center;">
											<td>{{ $key + 1 }}</td>
											<td>{{ $m->klasifikasi_umur }}</td>
											<td>{{ $m->laki }}</td>
											<td>{{ $m->perempuan }}</td>
										</tr>
									@endforeach
									<tr style="text-align: center;">
										<td colspan="2"><strong>Jumlah</strong></td>
										<td>{{ $jumLaki }}</td>
										<td>{{ $jumPerempuan }}</td>
									</tr>
									<tr style="text-align: center;">
										<td colspan="2"><strong>Total</strong></td>
										<td colspan="2"><strong>{{ $total }} jiwa</strong></td>
									</tr>
								</tbody>
							</table></center>
						</p>
					</header>
				</article>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection