<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequerenteController;
//namespace App\Http\Controllers;
use App\Http\Controllers\authControlador;
use App\Http\Controllers\MinisterioController;
use App\Http\Controllers\HomeController;
use App\Notifications\NotificationsClass;
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
Route:: get('/',fn()=> view('lay'));
Route:: get('/peticoes',fn()=> view('comunidade'));
Route:: get('/usuarios',fn()=> view('usuarios'));
Route:: get('/teste',fn()=> view('requerente'));
Route:: get('/estado',fn()=> view('estado'));
Route:: post('store',[RequerenteController :: class,'store']);
Route:: post('/autocomplete',[RequerenteController :: class,'autocomplete']);
Route:: post('/residenciaAutocomplete',[RequerenteController :: class,'ResidenciaAutocomplete']);

Route:: post('/nacaoAutocomplete',[RequerenteController :: class,'NacaoAutocomplete']);
Route:: get('/admin',fn()=> view('admin'));

Route::get('/cadastrar',function (){
    if(Auth::check()){
        return view('registo');
    }else{
        return view('admin');
    }

});
Route:: get('/carregar',[RequerenteController :: class,'Sms']);


Route::get('sms', [App\Notifications\NotificationsClass::class,'Sms']);

Route::get('notificar', [RequerenteController::class,'notificar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/imprimir/{id}', [App\Http\Controllers\ImprimirController::class, 'imprimir']);
Route::get('/print', [App\Http\Controllers\imprimirPeticoesController::class, 'imprimir']);
Route::Post('/iniciar', [App\Http\Controllers\HomeController::class, 'autent']);
Route::get('/pedidos', [App\Http\Controllers\HomeController::class, 'redirecionar']);
Route::post('/pesqui', [App\Http\Controllers\HomeController::class, 'ver']);
Route::get('/listar', [App\Http\Controllers\HomeController::class, 'listar']);
Route::get('/apagar/{id}', [App\Http\Controllers\HomeController::class, 'apagar']);
Route::get('/actualizar', [App\Http\Controllers\HomeController::class, 'actualizar']);
Route::post('/pesquisaa', [App\Http\Controllers\HomeController::class, 'procurar']);
Route::post('/criar', [App\Http\Controllers\HomeController::class, 'criar']);
Route::post('/actu/{id}', [App\Http\Controllers\EstadoController::class, 'actualizar']);
Route::post('/pesquisar', [App\Http\Controllers\EstadoController::class, 'ver']);


Auth::routes();




