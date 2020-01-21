@extends('admin.base')

@section('title', 'Ubah Admin/Staff')

@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen Admin & Staff<small> Dusun Bulu</small></h3>
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
              <h2>Ubah Admin/Staff <small>Manajemen Admin & Staff</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if ($errors->has('password'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
              @if ($errors->has('nama'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('nama') }}</strong>
                </div>
              @endif
              @if ($errors->has('email'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
              @if ($errors->has('level'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('level') }}</strong>
                </div>
              @endif
              @if ($errors->has('status'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ $errors->first('status') }}</strong>
                </div>
              @endif
              @if(Session::has('gagal'))
                <div class="alert alert-warning alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Gagal!</strong> {{ Session::get('gagal') }}
                </div>
              @endif
              <form id="add-role" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('user.update', $user->id) }}">
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="PUT">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Level <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="level" required="">
                        <option value="">-- Pilih Level --</option>
                        <option value="1" @if ($user->is_admin == 1)
                                    selected="" 
                                  @endif>Admin
                        </option>
                        <option value="0" @if ($user->is_admin == 0)
                                    selected="" 
                                  @endif>Staff
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="status" required="">
                          <option value="">-- Pilih status --</option>
                          <option value="1" @if ($user->is_active == 1)
                            selected="" 
                          @endif>Aktif</option>
                          <option value="0" @if ($user->is_active == 0)
                            selected="" 
                          @endif>Tidak Aktif</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="{{ route('user.index') }}" type="button" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
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