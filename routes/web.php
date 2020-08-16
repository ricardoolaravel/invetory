<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Models\Employee;

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function(){
    
    /**
     * Rota para usuarios
     */
    Route::put('employee/{id}', 'EmployeeController@update')->name('employee.update');
    Route::get('{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
   
    Route::put('employee/{id}', 'EmployeeController@update')->name('employee.update');
    Route::post('employees/store', 'EmployeeController@store')->name('employees.store');
    Route::get('employees/create', 'EmployeeController@create')->name('employees.create');
    Route::any('employees/search', 'EmployeeController@search')->name('employees.search');
    Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('employees', 'EmployeeController@index')->name('employees.index');





    /**
     * Rota para Setores
     */

    Route::get('sectors/create', 'SectorController@create')->name('sectors.create');
    Route::put('sectors/{url}', 'SectorController@update')->name('sectors.update');
    Route::get('{url}/edit', 'SectorController@edit')->name('sectors.edit');
    Route::any('sectors/search', 'SectorController@search')->name('sectors.search');
    Route::get('sectors', 'SectorController@index')->name('sectors.index');
    Route::post('sectors/', 'SectorController@store')->name('sectors.store');
    Route::get('sectors/{url}', 'SectorController@show')->name('sectors.show');
    Route::delete('sectors/{url}', 'SectorController@destroy')->name('sectors.destroy');
    Route::get('/', 'SectorController@index')->name('admin.index');
});




Route::get('/', function () {
    return view('welcome');
});
