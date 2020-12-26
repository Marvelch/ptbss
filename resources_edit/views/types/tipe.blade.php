@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tipe</li>
                </ol>
            </nav>
            
            <div class="card">
                <div class="card-body col-md-6">
                <form method="post" action="{{route('tipe.store')}}">
                @csrf
                <div class="form-group">
                    <label for="">Nama Tipe</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" name="kode" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
