<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CSVUploadController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use  App\Http\Controllers\NewstudentController;
use App\Http\Controllers\LeaverequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'load_login'])->name('login');
Route::post('/store-login', [AuthController::class, 'login']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::resource('/permissions', PermissionController::class);
    Route::get('/permissions/{permissionId}/delete', [PermissionController::class, 'destory']);
    Route::resource('/users', UserController::class);
    Route::get('/users/{userId}/delete', [UserController::class, 'destory']);
    Route::resource('/roles', RoleController::class);
    Route::get('/roles/{roleId}/delete', [RoleController::class, 'destory']);
    Route::get('/roles/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('/roles/{roleId}/give-permission', [RoleController::class, 'updatePermissionToRole']);
});


Route::middleware('auth')->group(function () {
    Route::get('/leave', [LeaverequestController::class, 'index'])->name('leave.index');
    Route::post('/apply-leave', [LeaverequestController::class, 'apply'])->name('leave.apply');
    Route::post('/leave/{leaveRequest}/approve', [LeaverequestController::class, 'approve'])->name('leave.approve');
    Route::post('/leave/{leaveRequest}/reject', [LeaverequestController::class, 'reject'])->name('leave.reject');
});

Route::middleware('auth')->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/department/show/{id}', [DepartmentController::class, 'show'])->name('department.show');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/designations', [DesignationController::class, 'index'])->name('designations.index');
    Route::get('/designation/show/{id}', [DesignationController::class, 'show'])->name('designation.show');
    Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('/designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::get('/designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
});
