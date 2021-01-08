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
                    <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Permintaan</h6>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Kode Permintaan</label>
                                    <select name="kodeunique" id="kodeunique" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($KodeUnique as $Kode)
                                        <option value="{{$Kode}}">{{$Kode}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button id="KirimCetak" class="btn btn-primary">Cetak Laporan</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#KirimCetak').on('click',function(event) {
        event.preventDefault();

        let kodeunique = $('#kodeunique').find('option').filter(':selected').val();
        
        // window.location.href='/Pag2/Laporan/'+kodeunique;
        window.open('/Pag2/Laporan/'+kodeunique,'_blank' // <- This is what makes it open in a new window.
);
    } );
</script>
@endsection