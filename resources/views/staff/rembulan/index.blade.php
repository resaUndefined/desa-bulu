@extends('staff.base')

@section('title', $karangTaruna->karang_taruna)

@section('content')
	<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4>{{ $karangTaruna->karang_taruna }} <small>Dusun Bulu</small></h4>
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
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="{{ route('rembulan.create') }}" type="button" class="btn btn-round btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data <strong>{{ $karangTaruna->karang_taruna }}</strong></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  @if(Session::has('sukses'))
                    <div class="alert alert-success alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> {{ Session::get('sukses') }}
                    </div>
                  @endif
                  @if(Session::has('gagal'))
                    <div class="alert alert-warning alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Gagal!</strong> {{ Session::get('gagal') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="row">
            <div class="x_content">
              @if (count($rembulan) > 0)
              <h3>Data <strong>{{ $karangTaruna->karang_taruna }}</strong></h3>
              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th class="th-table">No</th>
                    <th class="th-table">Jabatan</th>
                    <th class="th-table">Nama Pejabat</th>
                    <th class="th-table">Action</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($rembulan as $key => $m)
                      <tr>
                        <th scope="row" class="col-md-1">{{ $rembulan->firstItem() + $key }}</th>
                        <td>{{ $m->jabatan }}</td>
                        <td>{{ $m->pejabat }}</td>
                        <td class="col-md-2">
                          <a href="{{ route('rembulan.edit', $m->detail_id) }}" type="button" class="btn btn-round btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                          <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$m->detail_id}})" 
                              data-target="#DeleteModal" class="btn btn-round btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              @else
              <h3 style="text-align: center;vertical-align: middle;">Data Karang Taruna Rembulan belum ditambahkan</h3>
              @endif
              {{-- pagination --}}
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div>Menampilkan {{ $rembulan->firstItem() }} sampai {{ $rembulan->lastItem() }} dari total {{ $rembulan->total() }} Anggota</div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                  <div style="margin-top: -25px; margin-bottom: -15px;" class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                      {{ $rembulan->links() }}
                    </div>
                </div>
              </div>
              {{-- end pagination --}}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <div id="DeleteModal" class="modal fade text-danger" role="dialog">
         <div class="modal-dialog ">
           <!-- Modal content-->
           <form action="" id="deleteForm" method="post">
               <div class="modal-content">
                   <div class="modal-header bg-danger">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                   </div>
                   <div class="modal-body">
                       {{ csrf_field() }}
                       {{ method_field('DELETE') }}
                       <p class="text-center">Apa kamu yakin ingin menghapus data ini ?</p>
                   </div>
                   <div class="modal-footer">
                       <center>
                           <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                           <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
                       </center>
                   </div>
               </div>
           </form>
         </div>
        </div>
        <script type="text/javascript">
          function deleteData(id){
             var id = id;
             var url = '{{ route("rembulan.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteForm").attr('action', url);
           }

          function formSubmit(){
               $("#deleteForm").submit();
          }
        </script>
@endsection