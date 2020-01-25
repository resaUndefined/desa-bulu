@extends('staff.base')

@section('title', 'Detail Destinasi')

@section('content')
	<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4>Detail Destinasi <small>Dusun Bulu</small></h4>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <br>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <div class="clearfix"></div>
            </div>
            <div class="row">
            <div class="x_content">
              @if (!is_null($destinasi))
              <h3>Data Detail Destinasi</h3>
              <table class="table table-hover table-responsive">
                  <tr>
                    <th>Destinasi</th>
                    <td>: {{ $destinasi->judul }}</td>
                  </tr>
                  <tr>
                    <th>Author</th>
                    <td>: {{ $destinasi->author }}</td>
                  </tr>
                  <tr>
                    <th>Published</th>
                    <td>: {{ date('d F Y', strtotime($destinasi->created_at)) }}</td>
                  </tr>
                  <tr>
                    <th>Slider</th>
                    <td>: 
                          @if ($destinasi->is_slider == 1)
                            <i class="fa fa-check"></i>
                          @else
                            <i class="fa fa-times" style="color: red;"></i>
                          @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Deskripsi</th>
                    <td>: {!! $destinasi->isi !!}</td>
                  </tr>
                  <tr>
                    <th>Gambar</th>
                    <td>: <img src="{{ url('/images/'.$destinasi->gambar) }}" style="width: 240px;height: 150px;"></td>
                  </tr>
              </table>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="{{ route('destinasi.index') }}" type="button" class="btn btn-round btn-info btn-sm"><i class="fa fa-edit"></i> Kembali</a>
              </div>
              @else
              <h3 style="text-align: center;vertical-align: middle;">Data destinasi belum ditambahkan</h3>
              @endif
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection