<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ResponseRedirectHomeController;
use Illuminate\Support\Facades\Http;

Route::get('/quiz', function(){
  $response = Http::get('https://quizapi.io/api/v1/questions', [
      'apiKey' => 'SwoOw0vIUY5FIlNnnMIqT4E4pbIMa6Fon67Xxisp',
      'limit' => 10,
  ]);
  
  dd($response->json());
});

Route::get('/enctype', function(){
   $decrypted = Crypt::decryptString('eyJpdiI6IitNdzNldUFuZXRyQ0Z6bVRmZmtTRnc9PSIsInZhbHVlIjoiTDRURWpZK1pJWTBQZGFzNFlTUm1uVDNIZS8wYW90VllkWkh2elpGM0RCbUo2RHhNZnRWYzlrQXFnZFh3Y2VudiIsIm1hYyI6IjlkNDMzMDdiMGZkYTQxNzI5Yjc5NWRhYWIwZGZkOGE5NDMzMDUyODI3MmIzOTA0MTNhOTE5Mzk3ZWE1MDIxZDUifQ==');
   dd($decrypted, 'SwoOw0vIUY5FIlNnnMIqT4E4pbIMa6Fon67Xxisp');
});

Route::get('/', HomeController::class);
Route::get('/redirect', ResponseRedirectHomeController::class);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::middleware(['auth:sanctum', 'verified', 'role:administrator'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.administrator');
      Route::prefix('management')->group(function(){
        Route::get('/series', [SeriesController::class, 'index'])->name('administrator.management.series');
      });
      
      Route::prefix('create')->group(function(){
        //
      });
      
      Route::prefix('store')->group(function(){
        Route::post('/series', [SeriesController::class, 'store'])->name('administrator.store.series');
      });

      Route::prefix('detail')->group(function(){
        //
      });

      Route::prefix('edit')->group(function(){
        //
      });

      Route::prefix('update')->group(function(){
        Route::patch('/series', [SeriesController::class, 'update'])->name('administrator.update.series');
      });

      Route::prefix('destroy')->group(function(){
        Route::delete('/series/{series:slug}', [SeriesController::class, 'destroy'])->name('administrator.destroy.series');
      });
});

Route::middleware(['auth:sanctum', 'verified', 'role:mentor'])->prefix('mentor')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.mentor');
});

Route::middleware(['auth:sanctum', 'verified', 'role:student'])->prefix('student')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.student');
});