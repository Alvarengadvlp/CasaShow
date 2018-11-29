<?php

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

/*
*/
Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function () { //->middleware('Autorizador')-
    Route::get('/', 'AdminController@index')->name('admin.home');
    
      Route::prefix('eventos')->group(function () { 
        Route::get('novo', 'EventoController@novo')->name('admin.evento.novo');
        Route::get('detalhe/{id}', 'EventoController@detalhe')->name('admin.evento.detalhe');
        Route::get('editar/{id}', 'EventoController@editar')->name('admin.evento.editar');
        Route::put('update/{id}'  , 'EventoController@update')->name('admin.evento.update' );
        Route::get('excluir/{id}', 'EventoController@excluir')->name('admin.evento.excluir');
        Route::post('create', 'EventoController@create')->name('admin.evento.create');
        Route::any('assoc/{id}', 'FuncionarioController@createAssoc')->name('admin.funcionario.assoc');
        Route::get('assoc/evento/{eid}/funcionario/{fid}', 'FuncionarioController@assocExcluir')->name('admin.funcionario.assoc.excluir');
        Route::get('index', 'EventoController@index')->name('admin.evento.index'); 
        Route::any('buscar', 'EventoController@buscar')->name(     'evento.buscar'   );
     
      });

      Route::prefix('funcionarios')->group(function () { 
        Route::get('novo', 'FuncionarioController@novo')->name('admin.funcionario.novo');
        Route::post('create', 'FuncionarioController@create')->name('admin.funcionario.create');
        Route::get('index', 'FuncionarioController@index')->name('admin.funcionario.index'); 
        Route::get('excluir/{id}', 'FuncionarioController@excluir')->name('admin.funcionario.excluir');
        Route::get('editar/{id}', 'FuncionarioController@editar')->name('admin.funcinario.editar');
        Route::put('update/{id}'  , 'FuncionarioController@update')->name('admin.funcionario.update' );


        Route::any('buscar'       , 'FuncionarioController@buscar')->name(     'funcionario.buscar'   );


     
      });
  });




Route::get('/', 'PortalController@index')->name('home');

Route::get('cargos/{nomeCargo}', 'Controller@getCargos');

Auth::routes();


