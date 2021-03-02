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
Route::get('editar/logo/{id}',  [App\Http\Controllers\GeneralManager::class, 'edit_logo'])->name('edit.logo');
Route::post('editar/logo',  [App\Http\Controllers\GeneralManager::class, 'update_logo'])->name('update.logo');
Route::get('eliminar/logo/{id}',  [App\Http\Controllers\GeneralManager::class, 'delete_logo'])->name('delete.logo');

Route::post('registrar/logo',  [App\Http\Controllers\GeneralManager::class, 'store_logo'])->name('store.logo');
Route::get('mostrar/comentarios_adm/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_comments'])->name('show.comments_adm');
Route::post('registrar/comentarios_adm',  [App\Http\Controllers\GeneralManager::class, 'store_comments_adm'])->name('store.comments_adm');

Route::get('mostrar/planners/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_planners'])->name('show.planners');

Route::get('mostrar/planners_posts/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_planners_posts'])->name('show.planners.posts');


Route::get('mostrar/mis_planners_posts/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_my_planners_posts'])->name('show.my.planners.posts');


Route::get('agregar/post/{id}',  [App\Http\Controllers\GeneralManager::class, 'add_posts'])->name('add.posts');
Route::post('registrar/planner',  [App\Http\Controllers\GeneralManager::class, 'store_planner'])->name('store.planner');

Route::get('editar/planner/{id}',  [App\Http\Controllers\GeneralManager::class, 'edit_planner'])->name('edit.planner');
Route::post('editar/planner',  [App\Http\Controllers\GeneralManager::class, 'update_planner'])->name('update.planner');
Route::get('eliminar/planner/{id}',  [App\Http\Controllers\GeneralManager::class, 'delete_planner'])->name('delete.planner');
Route::get('editar/post/{id}',  [App\Http\Controllers\GeneralManager::class, 'edit_post'])->name('edit.post');
Route::get('approbar/post/{id}',  [App\Http\Controllers\GeneralManager::class, 'approved_post'])->name('approved.post');
Route::post('editar/post',  [App\Http\Controllers\GeneralManager::class, 'update_post'])->name('update.post');


Route::get('mostrar_logos',  [App\Http\Controllers\GeneralManager::class, 'show_all_logos'])->name('show.all_logos');
Route::get('mostrar_planners',  [App\Http\Controllers\GeneralManager::class, 'show_all_planners'])->name('show.all_planners');
Route::get('mostrar_clientes',  [App\Http\Controllers\GeneralManager::class, 'show_all_customers'])->name('show.all_customers');

Route::get('edit/customer/{id}',  [App\Http\Controllers\GeneralManager::class, 'edit_customer'])->name('edit.customer');


Route::get('agregar/cliente',  [App\Http\Controllers\GeneralManager::class, 'add_customer'])->name('add.customer');
Route::post('registrar/cliente',  [App\Http\Controllers\GeneralManager::class, 'store_customer'])->name('store.customer');
Route::post('editar/cliente',  [App\Http\Controllers\GeneralManager::class, 'update_customer'])->name('update.customer');


Route::get('/download_logos/{file}',[App\Http\Controllers\GeneralManager::class, 'download_logos']);
Route::get('/download_planners/{file}',[App\Http\Controllers\GeneralManager::class, 'download_planners']);



Route::resource('customers', App\Http\Controllers\CustomersController::class);

Route::get('mostrar/comentarios/{id}',  [App\Http\Controllers\CustomersController::class, 'show_comments'])->name('show.my.comments');

Route::get('mostrar_mis/logos/{id}',  [App\Http\Controllers\CustomersController::class, 'show_my_logos'])->name('show.my_logos');
Route::get('mostrar_mis/planners/{id}',  [App\Http\Controllers\CustomersController::class, 'show_my_planners'])->name('show.my_planners');
Route::post('registrar/comentarios/post',  [App\Http\Controllers\CustomersController::class, 'store_my_comments_post'])->name('store.my.comments.post');

Route::post('registrar/comentarios',  [App\Http\Controllers\CustomersController::class, 'store_comments'])->name('store.comments');


Route::get('/show_imagen_modal',  [App\Http\Controllers\CustomersController::class, 'show_imagen_modal'])->name('show_imagen_modal');

Route::get('/show_planner_modal',  [App\Http\Controllers\CustomersController::class, 'show_planner_modal'])->name('show_planner_modal');




Route::get('/show_my_calendar',  [App\Http\Controllers\GeneralManager::class, 'show_my_calendar']);







