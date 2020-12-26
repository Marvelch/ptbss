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
                <h6 class="m-0 font-weight-bold text-primary">Pengubahan Data Supplier</h6>
            </div>
            <div class="card-body">
                @foreach($suppliers as $supplier)
                <form method="post" action="{{route('supplier.update',$supplier->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{$supplier->kode}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" class="form-control" value="{{$supplier->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{$supplier->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <input type="text" name="kota" class="form-control" value="{{$supplier->kota}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control" value="{{$supplier->status}}">
                    </div>
                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="text" name="notelpon" class="form-control" value="{{$supplier->notelpon}}">
                    </div>
                    <div class="form-group">
                        <label for="">Fax</label>
                        <input type="text" name="fax" class="form-control" value="{{$supplier->fax}}">
                    </div>
                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" name="pic" class="form-control" value="{{$supplier->pic}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Perubahan</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                    src="{{asset('img/undraw_posting_photo.svg')}}" alt="">
                </div>
                <p>
                    {{-- Informasi --}}
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Kode Data Supplier</b> : <i>{{$supplier->kode}}</i></li>
                        <li class="list-group-item"><b>Tanggal Perubahan</b> : @php echo date('d/m/Y'); @endphp</li>
                      </ul>
                </p>
            </div>
        </div>
    </div>
   </div>
   @endforeach
</div>
@endsection
