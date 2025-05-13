<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CenterManagementController;
use App\Http\Controllers\ManagerMasterController;
use App\Http\Controllers\ChildMasterController;
use App\Http\Controllers\ProgramMasterController;
use App\Http\Controllers\FeesMasterController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProgramGenController;

Route::get('/', function () {
    return view('index');
});

Route::resource('center-managements', CenterManagementController::class);
// Route::get('center-managements/index', [CenterManagementController::class, 'index']);
Route::resource('manager-masters', ManagerMasterController::class);
Route::resource('child-masters', ChildMasterController::class);
Route::get('/get-child-programs/{centerId}', [ChildMasterController::class, 'getPrograms']);
Route::resource('program-masters', ProgramMasterController::class);
Route::get('/get-programs/{centerId}', [ProgramMasterController::class, 'getPrograms']);
Route::resource('fees-masters', FeesMasterController::class);
Route::get('/get-fees-programs/{centerId}', [FeesMasterController::class, 'getPrograms']);
Route::resource('user-managements', UserManagementController::class);
Route::resource('program-create', ProgramGenController::class);




