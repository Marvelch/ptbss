@extends('layouts.admin')

@section('content_admin')

<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif

   <div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kartu Stok</h6>
            </div>
            <form action="{{url('/Pag4/Print')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pilih Barang</label>
                            <select name="kodebarang" id="" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($prints as $print)
                                    <option value="{{$print->kode}}">{{$print->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-primary">Lihat Barang</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
   </div>
</div>
@endsection
