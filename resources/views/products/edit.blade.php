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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tipe</h6>
            </div>
            <div class="card-body">
                @foreach($data as $data_tipe)
                <form method="post" action="{{route('products.update',$data_tipe->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{$data_tipe->kode}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" class="form-control" value="{{$data_tipe->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <select name="status" id="" class="form-control">
                            @foreach($data as $result)
                                <option value="{{$result->id}}">&#8730; {{$result->status}}</option>
                            @endforeach
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <select name="type_id" id="" class="form-control">
                            @foreach($tipe as $key)
                                <option value="{{$key->id}}">{{$key->nama}} | {{$key->kode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{$data_tipe->harga}}">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" class="form-control" value="{{$data_tipe->stok}}">
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
