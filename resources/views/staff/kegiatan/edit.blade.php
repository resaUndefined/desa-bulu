@extends('staff.base')

@section('title', 'Edit Kegiatan')

@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen Kegiatan<small> Dusun Bulu</small></h3>
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
              <h2>Edit Kegiatan <small>Manajemen Kegiatan</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if ($errors->has('nama_kegiatan'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('nama_kegiatan') }}</strong>
                </div>
              @endif
              <form id="add-role" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('kegiatan.update', $kegiatan->id) }}">
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="PUT">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nama_kegiatan" name="nama_kegiatan" required="required" class="form-control col-md-7 col-xs-12" value="{{ $kegiatan->nama_kegiatan }}">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="{{ route('kegiatan.index') }}" type="button" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection