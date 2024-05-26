<?php

use App\Http\Controllers\Admin as Admin;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [Admin\AdminController::class, 'index'])->name('index');
    Route::resource('connections', Admin\ConnectionController::class)->except('show');
    Route::resource('schemas', Admin\SchemaController::class)->except('show');
    Route::resource('dataTables', Admin\DataTableController::class)->except('show');

    Route::resource('tables', Admin\TableController::class)->except('show');
    Route::get('tables/create-second', [Admin\TableController::class, 'createSecondStep'])
        ->name('tables.createSecondStep');
    Route::get('tables/create-third', [Admin\TableController::class, 'createThirdStep'])
        ->name('tables.createThirdStep');
});

require __DIR__ . '/auth.php';
