<?php

use App\Http\Controllers\Administrator\ClassroomController;
use App\Http\Controllers\Administrator\TeacherController;
use App\Http\Controllers\Administrator\StudentController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('halo');
});


Route::prefix('administrator')->as('administrator.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');

    Route::middleware(['auth'])->group(function () {
        //====Dashboard====//
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //====Classroom====//
        Route::get('/kelas', [ClassroomController::class, 'index'])->name('classroom');
        Route::get('/kelas/tambah', [ClassroomController::class, 'create'])->name('classroom.create');
        Route::get('/kelas/{id}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');

        //====Teacher====//
        Route::get('/guru', [TeacherController::class, 'index'])->name('teacher');
        Route::get('/guru/tambah', [TeacherController::class, 'create'])->name('teacher.create');
        Route::get('/guru/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::get('/guru/{id}/detail', [TeacherController::class, 'show'])->name('teacher.detail');

        //====Student====//
        Route::get('/siswa', [StudentController::class, 'all'])->name('student');
        Route::get('/siswa/tambah', [StudentController::class, 'create'])->name('student.create');
        Route::get('/siswa/{id}', [StudentController::class, 'index'])->name('student.index');
        Route::get('/siswa/{id}/edit/{studentId}', [StudentController::class, 'edit'])->name('student.edit');
        Route::get('/siswa/{id}/detail/{studentId}', [StudentController::class, 'show'])->name('student.detail');
    });
});