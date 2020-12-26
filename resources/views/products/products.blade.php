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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Produk</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('products.store')}}">
                    @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="">Kode</label>
                                        @foreach($key as $kuy)
                                            <input type="text" name="kode" class="form-control" value="@php echo 'BRG'.sprintf('%05d', $kuy);  @endphp">
                                        @endforeach
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <select name="type_id" id="select1" class="form-control">
                            @foreach ($tipe as $tipe_result)
                                <option value="{{$tipe_result->id}}" id="{{$tipe_result->id}}">{{$tipe_result->nama}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tipe</label>
                        <select name="subid" id="select2" class="form-control">
                            @foreach ($subtipe as $item)
                                <option value="{{$item->id}}" id="{{$item->tipeid}}">{{$item->nama}}</option>
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
                    <div class="form-group">
                        <label for="">Satuan</label>
                        <select name="" id="" class="form-control">
                            <option value="">Pilih</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bonus</label>
                        <select name="" id="" class="form-control">
                            <option value="Iya">Iya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>

                    {{-- Contoh --}}
                    
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
                    src="{{asset('img/undraw_posting_photo.svg')}}" alt="">
                </div>
                <p>
                  
                </p>
            </div>
        </div>
    </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $("#select1").change(function() {
    if ($(this).data('options') == undefined) {
        /*Taking an array of all options-2 and kind of embedding it on the select1*/
        $(this).data('options', $('#select2 option').clone());
    }
    var id = $(this).val();
    var options = $(this).data('options').filter('[id=' + id + ']');
    $('#select2').html(options);
    });
</script>
@endsection
