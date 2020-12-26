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
    <div class="col-lg-6 mb-4">

        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Supplier</h6>
            </div>
            <div class="card-body">
                <form action="{{route('supplier.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <input type="text" name="kota" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="text" name="notelpon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No Fax</label>
                        <input type="text" name="fax" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" name="pic" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </div>
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambahan</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" name="kode" class="form-control">
                </div>
            </div>
        </div>
    </div>
   </div>
</form>
</div>
@endsection
