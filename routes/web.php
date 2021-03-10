<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ResponseRedirectHomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EpisodeController;

Route::get('filepond', function(){
  return view('filepond');
});

Route::get('/', HomeController::class);
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('redirect', ResponseRedirectHomeController::class);

Route::get('auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::middleware(['auth:sanctum', 'verified', 'role:administrator'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.administrator');
      Route::prefix('management')->group(function(){
        Route::get('role', [RoleController::class, 'index'])->name('administrator.management.role');
        Route::get('mentor', [MentorController::class, 'index'])->name('administrator.management.mentor');
        Route::get('student', [StudentController::class, 'index'])->name('administrator.management.student');
        Route::get('series', [SeriesController::class, 'index'])->name('administrator.management.series');
        Route::get('course', [CourseController::class, 'index'])->name('administrator.management.course');
        Route::get('episode', [EpisodeController::class, 'index'])->name('administrator.management.episode');
      });
      
      Route::prefix('create')->group(function(){
        //
      });
      
      Route::prefix('store')->group(function(){
        Route::post('series', [SeriesController::class, 'store'])->name('administrator.store.series');
      });

      Route::prefix('detail')->group(function(){
        //
      });

      Route::prefix('edit')->group(function(){
        //
      });

      Route::prefix('update')->group(function(){
        Route::patch('series', [SeriesController::class, 'update'])->name('administrator.update.series');
      });

      Route::prefix('destroy')->group(function(){
        Route::delete('series/{series:slug}', [SeriesController::class, 'destroy'])->name('administrator.destroy.series');
        Route::delete('course/{course:slug}', [CourseController::class, 'destroy'])->name('administrator.destroy.course');
      });
});

Route::middleware(['auth:sanctum', 'verified', 'role:mentor'])->prefix('mentor')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.mentor');
      Route::prefix('management')->group(function(){
        Route::get('student', [StudentController::class, 'index'])->name('mentor.management.student');
        Route::get('course', [CourseController::class, 'index'])->name('mentor.management.course');
        Route::get('episode', [EpisodeController::class, 'index'])->name('mentor.management.episode');
      });
      
      Route::prefix('destroy')->group(function(){
        Route::delete('course/{course:slug}', [CourseController::class, 'destroy'])->name('mentor.destroy.course');
      });
});

Route::middleware(['auth:sanctum', 'verified', 'role:student'])->prefix('student')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.student');
});
