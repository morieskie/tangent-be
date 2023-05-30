<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSkillController;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreEmployeeSkillRequest;

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



Route::post('/employees/{empoyeeId}/skills', function (Request $request, string $empoyeeId) {
    $request->merge(['employee_id' => $empoyeeId]);
    $request->mergeIfMissing(['level' => 0]);
    $req = app(StoreEmployeeSkillRequest::class, $request->all());
    return app(EmployeeSkillController::class)->store($req);
});

Route::put('/employees/{empoyeeId}/skills/{employeeSkillId}', function (Request $request, string $empoyeeId, string $employeeSkillId) {
    $request->merge([
        'employee_id' => $empoyeeId,
        'employeeSkillId' => $employeeSkillId
    ]);
    $req = app(StoreEmployeeSkillRequest::class, $request->all());
    return app(EmployeeSkillController::class)->update($req, $employeeSkillId);
});

Route::delete('/employees/{empoyeeId}/skills/{employeeSkillId}', function (Request $request, string $empoyeeId, string $employeeSkillId) {
    $request->merge([
        'employee_id' => $empoyeeId,
        'employeeSkillId' => $employeeSkillId
    ]);
    return app(EmployeeSkillController::class)->destroy($request, $employeeSkillId);
});

Route::get('/employees', [EmployeeController::class, 'index']);

Route::post('/employees', function (StoreEmployeeRequest $request) {
    return app(EmployeeController::class)->store($request);
});

Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
