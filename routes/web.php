<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('general_manager', 'EmployeesController');
Route::resource('customers', 'CustomersController');

Route::get('servicios', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('portafolio', [App\Http\Controllers\HomeController::class, 'briefcase'])->name('briefcase');
Route::get('contacto', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');


Route::get('cliente/logo', 'Customers@index_logo');
Route::get('cliente/planners', 'Customers@index_logo');


Route::get('administrador',  [App\Http\Controllers\GeneralManager::class, 'index'])->name('administrator')
->middleware(['auth', 'administrator_rols']);
Route::get('empleados/logo', 'CustomersController@index_logo');
Route::get('empleados/planners', 'CustomersController@index_logo');


Route::get('mostrar/{id}',  [App\Http\Controllers\GeneralManager::class, 'show'])->name('show.customers');

Route::get('mostrar/logos/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_logos'])->name('show.logos');
Route::get('agregar/logo/{id}',  [App\Http\Controllers\GeneralManager::class, 'add_logo'])->name('add.logo');
Route::post('registrar/logo',  [App\Http\Controllers\GeneralManager::class, 'store_logo'])->name('store.logo');
Route::get('mostrar/comentarios_adm/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_comments'])->name('show.comments_adm');
Route::post('registrar/comentarios_adm',  [App\Http\Controllers\GeneralManager::class, 'store_comments_adm'])->name('store.comments_adm');

Route::get('mostrar/planners/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_planners'])->name('show.planners');
Route::get('agregar/planner/{id}',  [App\Http\Controllers\GeneralManager::class, 'add_planner'])->name('add.planner');
Route::post('registrar/planner',  [App\Http\Controllers\GeneralManager::class, 'store_planner'])->name('store.planner');



Route::get('mostrar_logos',  [App\Http\Controllers\GeneralManager::class, 'show_all_logos'])->name('show.all_logos');
Route::get('mostrar_clientes',  [App\Http\Controllers\GeneralManager::class, 'show_all_customers'])->name('show.all_customers');

Route::get('edit/customer/{id}',  [App\Http\Controllers\GeneralManager::class, 'edit_customer'])->name('edit.customer');


Route::get('agregar/cliente',  [App\Http\Controllers\GeneralManager::class, 'add_customer'])->name('add.customer');
Route::post('registrar/cliente',  [App\Http\Controllers\GeneralManager::class, 'store_customer'])->name('store.customer');
Route::post('editar/cliente',  [App\Http\Controllers\GeneralManager::class, 'update_customer'])->name('update.customer');


Route::get('/download/{file}',[App\Http\Controllers\GeneralManager::class, 'download']);



Route::resource('customers', App\Http\Controllers\CustomersController::class);

Route::get('mostrar/comentarios/{id}',  [App\Http\Controllers\CustomersController::class, 'show_comments'])->name('show.comments');
Route::get('mostrar_mis/logos/{id}',  [App\Http\Controllers\CustomersController::class, 'show_my_logos'])->name('show.my_logos');
Route::post('registrar/comentarios',  [App\Http\Controllers\CustomersController::class, 'store_comments'])->name('store.comments');
