<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/search', 'PermintaanController@selectSearch');

Route::group(['middleware' => 'admin'], function () {
  Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route');

  // Route ProductController
  Route::resource('products','ProductController');
  Route::get('data_produk','ProductController@data_produk');

  // Route TipeController 
  Route::resource('tipe','TipeController');
  Route::get('data_tipe','TipeController@data_tipe');

  // Route SupplirController 
  Route::resource('supplier','SupplierController');
  Route::get('suppliers','SupplierController@supplier');
  
  // Route Permintaan
  Route::resource('permintaan','PermintaanController');
  Route::post('hapussementara','PermintaanController@destroy_all');
  Route::post('permintaan_post','PermintaanController@perminstaansementara');
  Route::post('s_permintaan','PermintaanController@savepermintaan');
  Route::get('daftar/permintaan','PermintaanController@datapermintaan');
  Route::get('/live_search/action', 'PermintaanController@action')->name('live_search.action');

  Route::post('/category/getCategory/','PermintaanController@getCategory')->name('category.getCategory');

  Route::group(['prefix' => 'Pag3'], function(){
      Route::resource('Penerimaan','PenerimaanController');
      Route::get('getpermintaan/{id}','PenerimaanController@getpermintaan');
      Route::get('getKodePermintaan/{id}','PenerimaanController@JsonKodePermintaan');
      Route::get('getPermintaanData/{id}','PenerimaanController@DataPermintaan');
      Route::get('TestingPenerimaan','PenerimaanController@TestingUnit');
  });

  Route::group(['prefix' => 'Pag4'], function(){
      Route::resource('KartuStok','KartuStokController');
      Route::get('Print','KartuStokController@cetak');
      Route::get('/pegawai/cetak_pdf/{id}', 'KartuStokController@cetak_pdf');
      // Route::get('Testing','KartuStokController@cetak_pdf');
  });

  Route::group(['prefix' => 'Pag5'], function(){
      Route::resource('SubType','SubTipeController');
  });

  Route::group(['prefix' => 'Pag6'], function(){
    Route::resource('Invoice','InvoiceController');
    Route::get('DeleteInvoiceHistory','InvoiceController@DeleteInvo');
    Route::post('InvoiceTemp','InvoiceController@Store_All');
  });

  Route::get('Maintenance','HomeController@Maintenance');

  // Route::get('/admin/settings/findAirName','PenerimaanController@SupplierJson');
  Route::get('/channels/fetch/{id}','PenerimaanController@Jsonsupplier');
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');
});
