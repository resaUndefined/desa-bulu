@extends('staff.base')

@section('title', 'Dashboard')

@section('content')
	<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-comments-o"></i> Jumlah Artikel</span>
          <div class="count">{{ $artikel }} Postingan</div>
        <span class="count_bottom"><a href="{{ route('artikel.index') }}"><i class="fa fa-chevron-circle-right"></i> Lihat</a></span>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-comments-o"></i> Jumlah Destinasi</span>
          <div class="count">{{ $destinasi }} Postingan</div>
        <span class="count_bottom"><a href="{{ route('destinasi.index') }}"><i class="fa fa-chevron-circle-right"></i> Lihat</a></span>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-comments-o"></i> Jumlah Event</span>
          <div class="count">{{ $event }} Postingan</div>
        <span class="count_bottom"><a href="{{ route('event.index') }}"><i class="fa fa-chevron-circle-right"></i> Lihat</a></span>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Kepala Dukuh</span>
        <div class="count">{{ $desa->kepala_dukuh }}</div>
        <span class="count_bottom"><a href="{{ route('dusun.index') }}"><i class="fa fa-chevron-circle-right"></i> Lihat</a></span>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><a href="{{ route('rt.index') }}">Data KK tiap RT</a></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          @if (count($rt) > 0)
            <div class="x_content">
              @foreach ($rt as $key => $v)
                <div class="widget_summary">
                  <div class="w_left w_25" style="width:50%;">
                    <span>{{ $v->nama_rt }} (<strong>{{ $v->ketua_rt }}</strong>)</span>
                  </div>
                  <div class="w_center w_55" style="width:50%;">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $v->jml_kk }}%;">
                          <span>{{ $v->jml_kk }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              @endforeach
            </div>
          @endif
          
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2><a href="{{ route('masyarakat.index') }}">Data Jumlah Warga Dusun {{ $desa->desa }}</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="" style="width:100%">
                    <tbody><tr>
                      <th style="width:37%;">
                      </th>
                      <th>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                          <p class="">Jenis Kelamin</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <p class="">Jumlah</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Rwp5n5Gm33Ec5nna5f4bprvsyCRX5R9EbdWoHGNvW-okYclk" width="80%">
                      </td>
                      <td>
                        <table class="tile_info table-responsive">
                          <tbody>
                            <tr>
                                <td>
                                  <p>Laki-Laki</p>
                                </td>
                                <td><strong>{{ $laki }}</strong></td>
                            </tr>
                            <tr>
                                <td>
                                  <p>Perempuan</p>
                                </td>
                                <td><strong>{{ $perempuan }}</strong></td>
                            </tr>
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                  </div>
                </div>
      </div>
    </div>
  </div>
@endsection