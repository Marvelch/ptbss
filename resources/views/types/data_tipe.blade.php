@extends('layouts.admin')

@section('content_admin')
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    
   <div class="row">
    <div class="col-lg-12 mb-4">
      
        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kumpulan Data Tipe</h6>
            </div>
            <div class="card-body">
            <div class="card">
                <div class="card-body">
                  @if ($message = Session::get('success'))
                    <div class="alert alert-warning alert-warningblock">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                    <div class="form-group">
                        <input type="text" name="search" id="" class="form-control col-md-4" placeholder="Pencarian">
                    </div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tipe</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Status</th>
                            <th scope="col">Bantuan</th>
                          </tr>
                        </thead>
                        <?php $no = 0;?>                                                                
                        @foreach($tipe as $tipe_data)
                        <tbody>
                          <tr>
                            <?php $no++ ;?>
                            <th scope="row">{{ $no }}</th>
                            <td>{{$tipe_data->nama}}</td>
                            <td>{{$tipe_data->kode}}</td>
                            <td>{{$tipe_data->status}}</td>
                            <td>
                                <button class="btn btn-primary" type="button" onclick="window.location='{{ url("/tipe/$tipe_data->id/edit/") }}'">Ubah</button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    
   </div>
    
</div>
@endsection
