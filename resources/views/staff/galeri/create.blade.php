@extends('staff.base')

@section('title', 'Tambah Galery')

@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen Galery<small> Dusun Bulu</small></h3>
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
              <h2>Tambah Galery <small>Manajemen Galery</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if ($errors->has('gambar'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('gambar') }}</strong>
                </div>
              @endif
              @if ($errors->has('caption'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('caption') }}</strong>
                </div>
              @endif
              <form id="add-role" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Gambar <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="gambar" name="gambar" required="required" class="form-control col-md-7 col-xs-12"><span>ekstensi : .png, .jpg, max : 1mb file</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Caption <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="caption" name="caption" required="required" class="form-control col-md-7 col-xs-12" placeholder="tambahkan caption untuk gambar">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="{{ route('galeri.index') }}" type="button" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
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