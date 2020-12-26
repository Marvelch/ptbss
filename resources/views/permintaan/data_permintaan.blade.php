@extends('layouts.admin')

@section('content_admin')
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    
   <div class="row">
    <div class="col-lg-12 mb-4">

        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Permintaan</h6>
            </div>
            <div class="card-body">
              @if ($message = Session::get('success'))
              <div class="alert alert-warning alert-warningblock">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
              </div>
              @endif
              <div class="card">
                  <div class="card-body">
                      <div class="form-group">
                          <input type="text" id="search" name="search" class="form-control col-md-4" placeholder="Pencarian">
                      </div>
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Kode Permintaan</th>
                              <th scope="col">Nama Supplier</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Status</th>
                              <th scope="col">Total</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Bantuan</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
  
   fetch_customer_data();
  
   function fetch_customer_data(query = '')
   {
    $.ajax({
     url:"{{ route('live_search.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
     }
    })
   }
  
   $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
   });
  });
  </script>
@endsection
