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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Sub Tipe</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('SubType.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Tipe</label>
                        <Select class="form-control" class="form-control" name="idtipe">
                            <option value="">Pilih</option>
                            @foreach ($SubTypes as $sub)
                                <option value="{{$sub->id}}">{{$sub->nama}}</option>
                            @endforeach
                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tipe</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kode</label>
                        <input type="text" name="kode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih...</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
</div>
@endsection
