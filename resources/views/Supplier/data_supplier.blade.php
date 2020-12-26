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
                <h6 class="m-0 font-weight-bold text-primary">Kumpulan Data Produk</h6>
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
                          <input type="text" name="search" id="" class="form-control col-md-4" placeholder="Pencarian">
                      </div>
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Kode</th>
                              <th scope="col">Nama Supplier</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Kota</th>
                              <th scope="col">Status</th>
                              <th scope="col">No Telepon</th>
                              <th scope="col">Fax</th>
                              <th scope="col">PIC</th>
                              <th scope="col">Bantuan</th>
                            </tr>
                          </thead>
                          <?php $no = 0;?>
                          @foreach($suppliers as $supplier)
                          <tbody>
                            <tr>
                              <?php $no++ ;?>
                              <th scope="row">{{ $no }}</th>
                              <td>{{$supplier->kode}}</td>
                              <td>{{$supplier->nama}}</td>
                              <td>{{$supplier->alamat}}</td>
                              <td>{{$supplier->kota}}</td>
                              <td>{{$supplier->status}}</td>
                              <td>{{$supplier->notelpon}}</td>
                              <td>{{$supplier->fax}}</td>
                              <td>{{$supplier->pic}}</td>
                              <td>
                                      <button class="btn btn-primary" type="button"><a href="/supplier/{{ $supplier->id }}/edit/" style="text-decoration: none;color: white;">Ubah</a></button>
                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Hapus</button>
                                  <!-- <button class="btn btn-danger" style="margin-left:20px;" data-toggle="modal" data-target="#exampleModalCenter">Hapus</button> -->
                                  <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        {{-- Pop Up --}}
                                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Penghapusan</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  Penghapusan data bersifat permanen dari database.
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </form>
                                </td>
                            </tr>
                            
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
    
   </div>
    
</div>
@endsection
