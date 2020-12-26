@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tipe</li>
                </ol>
            </nav>
        
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="search" id="" class="form-control col-md-4" placeholder="Pencarian">
                    </div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tipe</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Bantuan</th>
                          </tr>
                        </thead>
                        <?php $no = 0;?>                                                                
                        @foreach($tipe as $tipe_data)
                        <tbody>
                          <tr>
                            <?php $no++ ;?>
                            <th scope="row">{{ $no }}</th>
                            <td>{{$tipe_data->kode}}</td>
                            <td>{{$tipe_data->nama}}</td>
                            <td>
                                <button class="btn btn-primary">Ubah</button>
                                <button class="btn btn-danger" style="margin-left:20px;" data-toggle="modal" data-target="#exampleModalCenter">Hapus</button>
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

{{-- Pop Up --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Perhatian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Penghapusan Data Bersifat Permanen !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </div>
  </div>
@endsection
