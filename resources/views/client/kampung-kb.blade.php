@extends('client.base')

@section('title', 'Kampung KB')

@section('content')
<div id="page-wrapper">
<!-- Main -->
<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-12 col-12-mobile imp-mobile" id="content" style="margin-bottom: -70px;">
				<article id="main">
					<header style="text-align: left;">
						<h2>KAMPUNG KB</h2>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;white-space: pre-wrap;">Kampung KB sebagai wahana pemberdayaan masyarakat adalah sebuah program dari BKKBN untuk meningkatkan kualitas hidup masyarakat di tingkat kampung atau yang setara melalui program KKBPK serta pembangunan sektor terkait lainnya dalam rangka mewujudkan keluarga kecil berkualitas.</p>
						<p style="display: block;font-size: 1em;margin: 0 0 0 1;line-height: 1.5em;text-align: justify;">Dusun {{ $dusun->desa }} sebagai salah satu Kampung KB yang ada di Indonesia merupakan Dusun program-programnya mengedepankan perencanaan keluarga dengan baik. Misalnya, diadakannya penyuluhan dari BKKBN Pemerintah Daerah setempat. Acara berbentuk penyuluhan yang berupa seminar tentang pendidikan anak usia dini dan pentingnya persiapan pernikahan. Dusun {{ $dusun->desa }} yang merupakan Kampung KB memang wajib mendapatkan penyuluhan agar program-program KB selalu terlaksana denagn baik di Dusun {{ $dusun->desa }}. Antusiasme kader PKK pun terlihat ketika mengikuti penyuluhan dan aktif berpartisipasi dalam kegiatan penyuluhan tersebut.</p>
					</header>
				</article>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection