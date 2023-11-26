<?php

use App\Http\Controllers\Achievements\AchievementController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Employees\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/register', [RegisterController::class, 'store']);






Route::apiResource('departments', DepartmentController::class);

Route::apiResource('achievements', AchievementController::class);

Route::apiResource('employees', EmployeeController::class);
