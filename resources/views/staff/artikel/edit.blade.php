@extends('staff.base')

@section('title', 'Edit Artikel')

@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen Artikel<small> Dusun Bulu</small></h3>
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
              <h2>Edit Artikel <small>Manajemen Artikel</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if ($errors->has('judul'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('judul') }}</strong>
                </div>
              @endif
              @if ($errors->has('isi'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('isi') }}</strong>
                </div>
              @endif
              @if ($errors->has('gambar'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('gambar') }}</strong>
                </div>
              @endif
              <form id="add-role" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="PUT">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="judul" name="judul" required="required" class="form-control col-md-7 col-xs-12" value="{{ $artikel->judul }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="is_slider">
                        <option value="1" @if ($artikel->is_slider == 1)
                          selected="" 
                        @endif>Ya</option>
                        <option value="0" @if ($artikel->is_slider == 0)
                          selected="" 
                        @endif>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea name="isi">{!! $artikel->isi !!}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Saat Ini
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img src="{{ url('/images/'.$artikel->gambar) }}" style="width: 200px;height: 120px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganti Gambar ?
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="gambar" name="gambar" class="form-control col-md-7 col-xs-12"><span>ekstensi : .png, .jpg, max : 1mb file</span>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="{{ route('artikel.index') }}" type="button" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
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