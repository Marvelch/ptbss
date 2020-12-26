@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
        
            <div class="card">
                <div class="card-body">

                    <div class="col-md-6">
                        <form method="post" action="{{route('products.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode</label>
                                @foreach($key as $kuy)
                                    <input type="text" name="kode" class="form-control" value="@php $hasil = substr("0000{$kuy}", - 7); $inisialisasi = 'BRG'; echo $inisialisasi.$hasil @endphp">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tipe</label>
                                <select name="type_id" id="" class="form-control">
                                    @foreach ($tipe as $tipes)
                                        <option value="{{$tipes->id}}">{{$tipes->kode}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
