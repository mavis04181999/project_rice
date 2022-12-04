<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EnumeratorController;
use App\Http\Controllers\Farm_ExtendedController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StressProneAreaController;
use App\Http\Controllers\UserController;
use App\Models\Farm;
use App\Models\Farmer;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');

    return to_route('login');
});

Route::controller(StressProneAreaController::class)->group(function()
{
    Route::get('/stresspronearea/dashboard', 'dashboard')->name('stresspronearea.dashboard');
    Route::get('/stresspronearea/province/{province}', 'province')->name('stresspronearea.province');
    Route::get('/stresspronearea/{stressProneArea}/edit', 'edit')->name('stresspronearea.edit');
    Route::post('/stresspronearea/store', 'store')->name('stresspronearea.store');

    Route::get('/stresspronearea/archive', 'archive')->name('stresspronearea.archive');

    Route::patch('/stresspronearea/{stressProneArea}/update', 'update')->name('stresspronearea.update');
    Route::get('/stresspronearea/{stressProneArea}/restore', 'restore')->name('stresspronearea.restore');
    Route::delete('/stresspronearea/destroy/{stressProneArea}', 'destroy')->name('stresspronearea.destroy');
});

Route::controller(AdminController::class)->group(function()
{
    Route::get('/admin/dashboard', 'index')->name('dashboard');
});

Route::controller(UserController::class)->group(function()
{

    Route::get('/users/create', 'create')->name('user.create');
    Route::get('/user/{user}/edit', 'edit')->name('user.edit');
    Route::get('/user/{user}/restore', 'restore')->name('user.restore');

    Route::post('/users/store', 'store')->name('users.store');

    Route::patch('/user/{user}/update', 'update')->name('user.update');
    Route::patch('/user/{user}/profile/update', 'update_profile')->name('user-profile.update');
    Route::patch('/user/{user}/login/update', 'update_login')->name('user-login.update');

    Route::delete('/user/destroy/{user}', 'destroy')->name('user.destroy');

});


Route::controller(EnumeratorController::class)->group(function()
{
    Route::get('/enumerator/form/farmer', 'form')->name('enumerator.form');
    Route::get('/enumerator/welcome', 'welcome')->name('enumerator.welcome');
    Route::get('/enumerator/dashboard', 'dashboard')->name('enumerator.dashboard');
    Route::get('/enumerator/map', 'map')->name('enumerator.map');

    Route::get('/enumerator/form/stress-prone-area', 'form2')->name('enumerator.form2');
});

Route::controller(SurveyController::class)->group(function()
{
    Route::post('/survey/submit', 'store')->name('survey.submit');
    Route::post('/survey/import', 'importSurvey')->name('survey.import');
});



Route::controller(FarmerController::class)->group(function() 
{
    Route::get('/farmer/{farmer}', 'show')->name('farmer.show');
    Route::get('/farmer/{farmer}/edit', 'edit')->name('farmer.edit');
    Route::patch('/farmer/{farmer}/update', 'update')->name('farmer.update');
    Route::patch('/farmer/{farmer}/profile/update', 'update_profile')->name('farmer-profile.update');

    Route::post('/farmer/download/export/xlsx/selected', 'xlsxExportSelectedFarmers')->name('xlsx.export-selected-farmers');
    Route::get('/farmer/download/export/xlsx/all', 'xlsxExportAllFarmers')->name('xlsx.export-all-farmers');
    

    Route::get('/farmers/archive', 'archive')->name('farmer.archive');
    Route::get('/farmers/{farmer_id}/restore', 'restore')->name('farmer.restore');
    Route::delete('/farmers/destroy/{farmer}', 'destroy')->name('farmer.destroy');

});

Route::controller(FarmController::class)->group(function() 
{
    
    Route::get('/farm/{farm}/edit', 'edit')->name('farm.edit');
    Route::patch('/farm/{farm}/information/update', 'update')->name('farm-information.update');
    Route::get('/farm/{farm}/download-pdf', 'pdf_farm')->name('farm.pdf-download');

    // Route::get('/farm/{farm}', 'show')->name('farm.show');
    // Route::patch('/farm/{farm}/update', 'update')->name('farm.update');
    // Route::patch('/farm/{farm}/profile/update', 'update_profile')->name('farm-profile.update');
    // Route::get('/farms/{farm_id}/restore', 'restore')->name('farm.restore');
    // Route::delete('/farms/destroy/{farm}', 'destroy')->name('farm.destroy');

});

Route::controller(Farm_ExtendedController::class)->group(function()
{
    Route::patch('/farm_extended/{farm_extended}/information/update', 'update')->name('farm_extended-information.update');
});

require __DIR__.'/auth.php';
