@extends('layouts.admin')

@section('content_admin')
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    
   <div class="row">
    <div class="col-lg-6 mb-4">

        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Product</h6>
            </div>
            <div class="card-body">
                @foreach($data_tipe as $data)
                <form method="post" action="{{route('tipe.update',$data->id)}}">
                 @method('PUT')
                 @csrf
                <div class="form-group">
                    <label for="">Nama Tipe</label>
                    <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" name="kode" class="form-control" value="{{$data->kode}}">
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Pilihan : &#8730; {{$data->status}}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="">
                </div>
                <p>
                    {{-- Informasi --}}
                </p>
            </div>
        </div>
    </div>
   </div>
    
</div>
@endsection
