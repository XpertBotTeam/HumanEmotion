<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\IncidentController;
use App\Models\Role;

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
    // $search='Off';
    // $role = Role::findOrFail('Citizen');
    // echo $role->id;
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/login', function () {
//     return view('profiles/index');
// });

Route::post('/check', [CheckController::class, 'check']);
Route::post('/Incident/add', [IncidentController::class, 'add']);