<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RingtoneController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Frontend\fRingtoneController;
use App\Http\Controllers\Frontend\fPhotoController;
Auth::routes([
  'register' => false,
  
]);


Route::group(array('middleware'=>'auth'),function(){
  Route::resource('/ringtones',RingtoneController::class);
  Route::resource('/photos',PhotoController::class);
});


Route::group(array(),function(){

  Route::get('/', [fRingtoneController::class, 'index']);
	Route::get('/ringtones/{id}/{slug}',[fRingtoneController::class, 'show'])->name('ringtones.show');
	Route::post('/ringtones/download/{id}',[fRingtoneController::class, 'downloadRingtone'])->name('ringtones.download');
	Route::get('/category/{id}',[fRingtoneController::class, 'category'])->name('ringtones.category');

	Route::get('/wallpapers',[fPhotoController::class, 'wallpaper']);

	Route::post('download1/{id}',[fPhotoController::class, 'download800x600'])->name('download1');
	Route::post('download2/{id}',[fPhotoController::class, 'download1280x1024'])->name('download2');
	Route::post('download3/{id}',[fPhotoController::class, 'download316x255'])->name('download3');
	Route::post('download4/{id}',[fPhotoController::class, 'download118x95'])->name('download4');




});
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
